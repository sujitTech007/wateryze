<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WaterReading extends Model
{
    protected $fillable = [
        'site_id', 'sensor_api_connection_id', 'ph', 'tds', 'turbidity', 'orp', 'cod', 'bod',
        'discharge_flow', 'temperature', 'recorded_at', 'notes',
    ];

    protected function casts(): array
    {
        return [
            'ph' => 'decimal:2',
            'tds' => 'decimal:3',
            'turbidity' => 'decimal:3',
            'orp' => 'decimal:3',
            'cod' => 'decimal:3',
            'bod' => 'decimal:3',
            'discharge_flow' => 'decimal:3',
            'temperature' => 'decimal:2',
            'recorded_at' => 'datetime',
        ];
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function sensorApiConnection(): BelongsTo
    {
        return $this->belongsTo(SensorApiConnection::class);
    }

    public function complianceIssues(array $limits): array
    {
        $issues = [];

        foreach ($this->complianceChecks($limits) as $check) {
            if ($check['in_range'] === false) {
                $issues[] = $check['name'];
            }
        }

        return $issues;
    }

    public function complianceChecks(array $limits): array
    {
        $parameters = [
            ['name' => 'pH', 'key' => 'ph', 'min' => $limits['ph_min'] ?? null, 'max' => $limits['ph_max'] ?? null, 'unit' => ''],
            ['name' => 'TDS', 'key' => 'tds', 'min' => null, 'max' => $limits['tds_max'] ?? null, 'unit' => 'ppm'],
            ['name' => 'Turbidity', 'key' => 'turbidity', 'min' => null, 'max' => $limits['turbidity_max'] ?? null, 'unit' => 'NTU'],
            ['name' => 'ORP', 'key' => 'orp', 'min' => $limits['orp_min'] ?? null, 'max' => $limits['orp_max'] ?? null, 'unit' => 'mV'],
            ['name' => 'COD', 'key' => 'cod', 'min' => null, 'max' => $limits['cod_max'] ?? null, 'unit' => 'mg/L'],
            ['name' => 'BOD', 'key' => 'bod', 'min' => null, 'max' => $limits['bod_max'] ?? null, 'unit' => 'mg/L'],
            ['name' => 'Discharge flow', 'key' => 'discharge_flow', 'min' => null, 'max' => $limits['discharge_flow_max'] ?? null, 'unit' => 'm³/day'],
        ];

        $checks = [];

        foreach ($parameters as $parameter) {
            $value = $this->{$parameter['key']};
            $hasMinimum = is_numeric($parameter['min']);
            $hasMaximum = is_numeric($parameter['max']);
            $configured = $hasMinimum || $hasMaximum;

            if ($value === null && ! $configured) {
                continue;
            }

            $checks[] = [
                ...$parameter,
                'value' => $value,
                'configured' => $configured,
                'in_range' => $value === null || ! $configured
                    ? null
                    : (! $hasMinimum || $value >= $parameter['min'])
                        && (! $hasMaximum || $value <= $parameter['max']),
            ];
        }

        return $checks;
    }

    public function complianceStatus(array $limits): string
    {
        $checks = array_filter(
            $this->complianceChecks($limits),
            fn (array $check): bool => $check['configured'] && $check['value'] !== null,
        );

        if ($checks === []) {
            return 'No data';
        }

        return $this->complianceIssues($limits) === [] ? 'Compliant' : 'Needs attention';
    }
}
