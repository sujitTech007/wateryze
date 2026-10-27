@php
    $connection = $connection ?? null;
    $parameterMap = $connection?->parameter_map ?? [];
    $parameterOptions = [
        'ph' => 'pH',
        'tds' => 'TDS',
        'turbidity' => 'Turbidity',
        'orp' => 'ORP',
        'cod' => 'COD',
        'bod' => 'BOD',
        'discharge_flow' => 'Discharge flow',
        'temperature' => 'Temperature',
    ];
@endphp

@if ($connection)
    <div class="col-12">
        <span class="form-label d-block">Site</span>
        <div class="form-control-plaintext">{{ $connection->site->name }}</div>
    </div>
@else
    <div class="col-12">
        <label class="form-label" for="site_id">Site <span class="text-danger">*</span></label>
        <select class="form-select" id="site_id" name="site_id" required>
            <option value="">Select a site</option>
            @foreach ($sites as $site)
                <option value="{{ $site->id }}" @selected((string) old('site_id') === (string) $site->id)>{{ $site->name }}</option>
            @endforeach
        </select>
    </div>
@endif

<div class="col-12">
    <label class="form-label" for="endpoint_url">HTTPS API URL <span class="text-danger">*</span></label>
    <input class="form-control" id="endpoint_url" type="url" name="endpoint_url" value="{{ old('endpoint_url', $connection?->endpoint_url) }}" maxlength="2048" placeholder="https://sensor-provider.example/api/latest" required>
    <div class="form-text">Use a public HTTPS endpoint that returns the latest reading as JSON. Private, local, and redirected destinations are blocked.</div>
</div>

<div class="col-12">
    <label class="form-label" for="bearer_token">Bearer token</label>
    <input class="form-control" id="bearer_token" type="password" name="bearer_token" value="" maxlength="4096" autocomplete="new-password" placeholder="{{ $connection?->bearer_token ? 'Saved securely; leave blank to keep it' : 'Optional API token' }}">
    <div class="form-text">The token is encrypted in storage and sent only in the HTTPS Authorization header.</div>
    @if ($connection?->bearer_token)
        <div class="form-check mt-2">
            <input class="form-check-input" id="clear_bearer_token" type="checkbox" name="clear_bearer_token" value="1">
            <label class="form-check-label" for="clear_bearer_token">Remove the saved token</label>
        </div>
    @endif
</div>

<div class="col-12">
    <fieldset class="border rounded p-3">
        <legend class="float-none w-auto px-2 fs-6">Select the parameters this API returns</legend>
        <p class="form-text">Enable only parameters available from this endpoint, then enter each value's dot notation JSON path (for example: <code>data.ph</code>). Add another connection to the same site for parameters provided by a different API.</p>
        @foreach ($parameterOptions as $parameter => $label)
            <div class="row g-2 align-items-center mb-2">
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" id="parameter_{{ $parameter }}" type="checkbox" name="parameters[{{ $parameter }}]" value="1"
                            @checked(old('parameters.'.$parameter, array_key_exists($parameter, $parameterMap) ? '1' : null) === '1')>
                        <label class="form-check-label" for="parameter_{{ $parameter }}">{{ $label }}</label>
                    </div>
                </div>
                <div class="col-md-8">
                    <label class="visually-hidden" for="path_{{ $parameter }}">{{ $label }} JSON path</label>
                    <input class="form-control form-control-sm" id="path_{{ $parameter }}" name="paths[{{ $parameter }}]" value="{{ old('paths.'.$parameter, $parameterMap[$parameter] ?? '') }}" maxlength="150" pattern="[A-Za-z0-9_.-]+" placeholder="JSON path, e.g. data.{{ $parameter }}">
                </div>
            </div>
        @endforeach
    </fieldset>
</div>

<div class="col-12">
    <label class="form-label" for="timestamp_path">Reading timestamp JSON path (optional)</label>
    <input class="form-control" id="timestamp_path" name="timestamp_path" value="{{ old('timestamp_path', $connection?->timestamp_path) }}" maxlength="150" pattern="[A-Za-z0-9_.-]+" placeholder="e.g. data.timestamp">
    <div class="form-text">If omitted, Wateryze uses the time the reading is fetched. If set, the API value must be a valid date/time and not in the future.</div>
</div>
