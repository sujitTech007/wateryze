@php($creating = $mode === 'create')

<div class="mb-4">
    <a href="{{ route('admin.users.index') }}" class="text-decoration-none">← Customer accounts</a>
    <h1 class="page-title mt-2 mb-1">{{ $creating ? 'Create customer' : 'Edit customer' }}</h1>
    <p class="text-muted mb-0">Administrator accounts are managed separately and cannot be changed here.</p>
</div>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<form action="{{ $creating ? route('admin.users.store') : route('admin.users.update', $user) }}" method="POST" class="card border-0 shadow-sm">
    @csrf
    @unless ($creating) @method('PUT') @endunless
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="first_name">First name</label>
                <input class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $user?->first_name) }}" maxlength="100" autocomplete="given-name" required>
                @error('first_name')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="last_name">Last name</label>
                <input class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user?->last_name) }}" maxlength="100" autocomplete="family-name" required>
                @error('last_name')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" type="email" name="email" value="{{ old('email', $user?->email) }}" maxlength="255" autocomplete="email" required>
                @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="phone">Phone number</label>
                <input class="form-control" id="phone" type="tel" name="phone" value="{{ old('phone', $user?->phone) }}" maxlength="30" autocomplete="tel-national" inputmode="tel" aria-describedby="phone-error" data-phone-picker data-phone-code="country_code" data-phone-country="phone_country">
                <input id="country_code" name="country_code" type="hidden" value="{{ old('country_code', $user?->country_code ?? '+1') }}">
                <input id="phone_country" name="phone_country" type="hidden" value="{{ old('phone_country', $user?->phone_country ?? 'ca') }}">
                @error('country_code')<div class="text-danger small">{{ $message }}</div>@enderror
                @error('phone_country')<div class="text-danger small">{{ $message }}</div>@enderror
                @error('phone')<div class="text-danger small">{{ $message }}</div>@enderror
                <div id="phone-error" class="text-danger small" data-phone-error role="alert"></div>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="company">Company</label>
                <input class="form-control" id="company" name="company" value="{{ old('company', $user?->company) }}" maxlength="255">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="industry">Industry</label>
                <input class="form-control" id="industry" name="industry" value="{{ old('industry', $user?->industry) }}" maxlength="255">
            </div>
            <div class="col-12"><hr><h2 class="h5">Address</h2></div>
            <div class="col-12">
                <label class="form-label" for="address">Street address</label>
                <input class="form-control" id="address" name="address" value="{{ old('address', $user?->address) }}" maxlength="255" autocomplete="street-address" data-google-address-autocomplete>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="city">City</label>
                <input class="form-control" id="city" name="city" value="{{ old('city', $user?->city) }}" maxlength="255" autocomplete="address-level2" data-google-address-component="city">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="province">Province / State</label>
                <input class="form-control" id="province" name="province" value="{{ old('province', $user?->province) }}" maxlength="100" autocomplete="address-level1" data-google-address-component="province">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="postal_code">Postal code</label>
                <input class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', $user?->postal_code) }}" maxlength="20" autocomplete="postal-code" data-google-address-component="postal_code">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="country">Country</label>
                <input class="form-control" id="country" name="country" value="{{ old('country', $user?->country) }}" maxlength="100" autocomplete="country-name" data-google-address-component="country">
            </div>
            <div class="col-12"><hr><h2 class="h5">Account password</h2></div>
            <div class="col-md-6">
                <label class="form-label" for="password">Password @if (! $creating)<span class="text-muted">(leave blank to keep current)</span>@endif</label>
                <input class="form-control" id="password" type="password" name="password" autocomplete="new-password" minlength="8" @required($creating)>
                @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label" for="password_confirmation">Confirm password</label>
                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" minlength="8" @required($creating)>
            </div>
        </div>
    </div>
    <div class="card-footer bg-white d-flex gap-2">
        <button class="btn btn-primary" type="submit">{{ $creating ? 'Create customer' : 'Save changes' }}</button>
        <a class="btn btn-outline-secondary" href="{{ route('admin.users.index') }}">Cancel</a>
    </div>
</form>
