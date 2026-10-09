@include('include.header')

<div class="container min-vh-100 d-flex align-items-center justify-content-center mt-5">
    <div class="row shadow-lg rounded-4 overflow-hidden mt-5 mb-5" style="max-width:100%; background:#fff;">
        <div class="col-md-6 p-5">
            <h3 class="fw-bold mb-1">Sign up</h3>
            <p class="text-muted mb-4">Sign up to access your personal account.</p>

            <form action="{{ route('signup.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="first_name" class="form-label mb-0">First Name</label>
                        <input id="first_name" name="first_name" type="text"
                            class="form-control @error('first_name') is-invalid @enderror"
                            value="{{ old('first_name') }}" maxlength="100" autocomplete="given-name" required>
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="last_name" class="form-label mb-0">Last Name</label>
                        <input id="last_name" name="last_name" type="text"
                            class="form-control @error('last_name') is-invalid @enderror"
                            value="{{ old('last_name') }}" maxlength="100" autocomplete="family-name" required>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="email" class="form-label mb-0">Email</label>
                        <input id="email" name="email" type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" maxlength="255" autocomplete="email" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="phone" class="form-label mb-0">Phone Number</label>
                        <input id="phone" name="phone" type="tel"
                            class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone') }}" maxlength="25" autocomplete="tel" inputmode="tel"
                            placeholder="Phone number" aria-describedby="phone-error" required>
                        <label id="country-code-label" for="country_code" class="form-label small mt-2 mb-0">
                            Country calling code
                        </label>
                        <input id="country_code" name="country_code" type="text"
                            class="form-control @error('country_code') is-invalid @enderror"
                            value="{{ old('country_code', '+91') }}" maxlength="4" autocomplete="tel-country-code"
                            inputmode="tel" pattern="\+[1-9][0-9]{0,2}" placeholder="+91"
                            title="Enter a country calling code, for example +91 or +1." required>
                        <input id="phone_country" name="phone_country" type="hidden" value="{{ old('phone_country') }}">
                        @error('country_code')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                        @error('phone')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                        <div id="phone-error" class="text-danger small" role="alert"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label for="password" class="form-label mb-0">Password</label>
                        <input id="password" name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror"
                            autocomplete="new-password" minlength="8" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button class="btn btn-outline-secondary mt-1" type="button" data-password-toggle="password"
                            aria-label="Show password" aria-pressed="false">Show password</button>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="password_confirmation" class="form-label mb-0">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password"
                            class="form-control" autocomplete="new-password" minlength="8" required>
                        <button class="btn btn-outline-secondary mt-1" type="button"
                            data-password-toggle="password_confirmation" aria-label="Show confirm password"
                            aria-pressed="false">Show password</button>
                    </div>
                </div>

                <div class="form-check mb-4 mt-2">
                    <input id="terms" name="terms" class="form-check-input @error('terms') is-invalid @enderror"
                        type="checkbox" value="1" @checked(old('terms')) required>
                    <label for="terms" class="form-check-label" style="font-size: 14px;">
                        I agree to all the <a href="{{ route('terms') }}">Terms</a> and
                        <a href="{{ route('terms') }}">Privacy Policies</a>
                    </label>
                    @error('terms')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="w-100 py-2 mb-1" style="background:#2f6db5; border:none; color:#fff; border-radius:8px; font-weight:600;">
                    Create account
                </button>
            </form>

            <p class="text-center small">
                Already have an account? <a href="{{ route('login') }}">Login</a>
            </p>
        </div>

        <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center p-4">
            <img src="{{ asset('public/front/images/signup.png') }}" alt="" class="img-fluid rounded-4" style="height:100%; object-fit:cover;">
        </div>
    </div>
</div>

@include('include.footer')
