
@php($site = $site ?? null)

<div class="row g-3">

    <div class="col-md-6">
        <label class="form-label">Site name <span class="text-danger">*</span></label>
        <input class="form-control" name="name" value="{{ old('name', $site?->name) }}" maxlength="255" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Facility type</label>
        <input class="form-control" name="facility_type" value="{{ old('facility_type', $site?->facility_type) }}" maxlength="120" placeholder="e.g. Brewery, spa, or treatment plant">
    </div>

    <div class="col-12">
        <label class="form-label">Street address <span class="text-danger">*</span></label>
        <input class="form-control" name="address" value="{{ old('address', $site?->address) }}" maxlength="255" autocomplete="street-address" data-google-address-autocomplete required>
        <div class="form-text">Enter an address and select a Google suggestion to fill in its location details. You can also enter the details manually.</div>
    </div>

    <div class="col-md-4">
        <label class="form-label">City <span class="text-danger">*</span></label>
        <input class="form-control" name="city" value="{{ old('city', $site?->city) }}" maxlength="120" autocomplete="address-level2" data-google-address-component="city" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Province/state <span class="text-danger">*</span></label>
        <input class="form-control" name="province" value="{{ old('province', $site?->province) }}" maxlength="100" autocomplete="address-level1" data-google-address-component="province" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Postal/ZIP code</label>
        <input class="form-control" name="postal_code" value="{{ old('postal_code', $site?->postal_code) }}" maxlength="20" autocomplete="postal-code" data-google-address-component="postal_code">
    </div>

    <div class="col-md-4">
        <label class="form-label">Country <span class="text-danger">*</span></label>
        <input class="form-control" name="country" value="{{ old('country', $site?->country ?? 'Canada') }}" maxlength="100" autocomplete="country-name" data-google-address-component="country" required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Treatment capacity (m³/day)</label>
        <input class="form-control" type="number" step="0.01" min="0.01" name="capacity" value="{{ old('capacity', $site?->capacity) }}">
    </div>

    <div class="col-md-4">
        <label class="form-label">Treatment type</label>
        <input class="form-control" name="treatment_type" value="{{ old('treatment_type', $site?->treatment_type) }}" maxlength="120">
    </div>

    <div class="col-md-6">
        <label class="form-label">Latitude</label>
        <input class="form-control" type="number" step="0.0000001" min="-90" max="90" name="latitude" value="{{ old('latitude', $site?->latitude) }}">
    </div>

    <div class="col-md-6">
        <label class="form-label">Longitude</label>
        <input class="form-control" type="number" step="0.0000001" min="-180" max="180" name="longitude" value="{{ old('longitude', $site?->longitude) }}">
    </div>

</div>
