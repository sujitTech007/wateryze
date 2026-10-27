<?php

namespace App\Services;

use App\Models\SensorApiConnection;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use JsonException;

class SensorApiClient
{
    private const PARAMETERS = [
        'ph' => ['min' => 0, 'max' => 14],
        'tds' => ['min' => 0],
        'turbidity' => ['min' => 0],
        'orp' => [],
        'cod' => ['min' => 0],
        'bod' => ['min' => 0],
        'discharge_flow' => ['min' => 0],
        'temperature' => ['min' => -50, 'max' => 200],
    ];

    public function __construct(private readonly ?\Closure $resolveAddress = null)
    {
    }

    /**
     * @return array{recorded_at: Carbon, values: array<string, float>}
     */
    public function fetch(SensorApiConnection $connection): array
    {
        $url = $connection->endpoint_url;
        $host = parse_url($url, PHP_URL_HOST);
        $address = $this->resolvePublicAddress($host);
        $resolve = $host.':443:'.(str_contains($address, ':') ? '['.$address.']' : $address);

        $request = Http::acceptJson()
            ->connectTimeout(3)
            ->timeout(10)
            ->withOptions([
                'allow_redirects' => false,
                'proxy' => false,
                'curl' => [CURLOPT_RESOLVE => [$resolve]],
            ]);

        if ($connection->bearer_token) {
            $request = $request->withToken($connection->bearer_token);
        }

        try {
            $response = $request->get($url);
        } catch (ConnectionException) {
            throw new SensorApiException('Could not connect to the sensor API. Check the URL and try again.');
        }

        if (! $response->successful()) {
            throw new SensorApiException('The sensor API returned HTTP '.$response->status().'.');
        }

        if (strlen($response->body()) > 1_000_000) {
            throw new SensorApiException('The sensor API response exceeds the 1 MB limit.');
        }

        try {
            $payload = json_decode($response->body(), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            throw new SensorApiException('The sensor API did not return valid JSON.');
        }

        if (! is_array($payload)) {
            throw new SensorApiException('The sensor API response must be a JSON object or array.');
        }

        $values = [];
        foreach ($connection->parameter_map as $parameter => $path) {
            if (! array_key_exists($parameter, self::PARAMETERS)) {
                throw new SensorApiException('The saved parameter configuration is invalid.');
            }

            $value = data_get($payload, $path);
            if (! is_numeric($value)) {
                throw new SensorApiException('The sensor API response is missing a numeric value for '.strtoupper($parameter).'.');
            }

            $value = (float) $value;
            if (! is_finite($value)) {
                throw new SensorApiException('The sensor API returned an invalid numeric value for '.strtoupper($parameter).'.');
            }

            $limits = self::PARAMETERS[$parameter];
            if (($limits['min'] ?? null) !== null && $value < $limits['min']) {
                throw new SensorApiException('The sensor API returned an out-of-range value for '.strtoupper($parameter).'.');
            }
            if (($limits['max'] ?? null) !== null && $value > $limits['max']) {
                throw new SensorApiException('The sensor API returned an out-of-range value for '.strtoupper($parameter).'.');
            }

            $values[$parameter] = $value;
        }

        if ($values === []) {
            throw new SensorApiException('Select at least one sensor parameter before syncing.');
        }

        $recordedAt = now();
        if ($connection->timestamp_path) {
            $timestamp = data_get($payload, $connection->timestamp_path);
            if (! is_string($timestamp) && ! is_numeric($timestamp)) {
                throw new SensorApiException('The sensor API response is missing its configured timestamp.');
            }

            try {
                $recordedAt = Carbon::parse((string) $timestamp);
            } catch (InvalidFormatException) {
                throw new SensorApiException('The sensor API returned an invalid timestamp.');
            }

            if ($recordedAt->isFuture()) {
                throw new SensorApiException('The sensor API timestamp cannot be in the future.');
            }
        }

        return ['recorded_at' => $recordedAt, 'values' => $values];
    }

    private function resolvePublicAddress(string|false $host): string
    {
        if (! is_string($host)) {
            throw new SensorApiException('Use a public HTTPS hostname for the sensor API.');
        }

        $host = strtolower(rtrim(trim($host, '[]'), '.'));
        if ($host === '' || filter_var($host, FILTER_VALIDATE_IP)) {
            throw new SensorApiException('Use a public HTTPS hostname for the sensor API.');
        }
        if (in_array($host, ['localhost'], true)
            || preg_match('/\.(local|internal|test|invalid)$/', $host)) {
            throw new SensorApiException('The sensor API host must be publicly reachable.');
        }

        $addresses = $this->resolveAddress
            ? ($this->resolveAddress)($host)
            : $this->lookupPublicAddresses($host);

        if (! is_array($addresses) || $addresses === []) {
            throw new SensorApiException('The sensor API host could not be resolved to a public IP address.');
        }

        foreach ($addresses as $address) {
            if (! is_string($address) || ! filter_var(
                $address,
                FILTER_VALIDATE_IP,
                FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE,
            )) {
                throw new SensorApiException('The sensor API host resolved to a non-public IP address.');
            }
        }

        if (! defined('CURLOPT_RESOLVE')) {
            throw new SensorApiException('The server HTTP client does not support safe DNS pinning.');
        }

        return $addresses[0];
    }

    private function lookupPublicAddresses(string $host): array
    {
        $records = dns_get_record($host, DNS_A | DNS_AAAA);
        if ($records === false) {
            throw new SensorApiException('The sensor API host could not be resolved.');
        }

        return array_values(array_filter(array_map(
            fn (array $record): ?string => $record['ip'] ?? $record['ipv6'] ?? null,
            $records,
        )));
    }
}
