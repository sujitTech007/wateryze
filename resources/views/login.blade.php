@include('include.header')

<div class="container min-vh-100 d-flex align-items-center justify-content-center mt-5">
    <div class="row shadow-lg rounded-4 overflow-hidden" style="width: 100%; background:#fff; border-radius: 8px;">
        <div class="col-md-6 p-5">
            <h3 class="fw-bold mb-1">Login</h3>
            <p class="text-muted mb-4">Login to access your account</p>

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" autocomplete="email" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input id="password" name="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" autocomplete="current-password" required>
                        <button class="btn btn-outline-secondary" type="button" data-password-toggle="password"
                            aria-label="Show password" aria-pressed="false">Show</button>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-4">
                    <input id="remember" name="remember" class="form-check-input" type="checkbox" value="1"
                        @checked(old('remember'))>
                    <label for="remember" class="form-check-label">Remember me</label>
                </div>

                <button type="submit" class="login w-100 py-2 mb-3 text-white"
                    style="background: #2f6db5; border-radius: 8px; border: 1px;">
                    Login
                </button>
            </form>

            <p class="text-center small">
                Don’t have an account? <a href="{{ route('signup') }}">Sign up</a>
            </p>
        </div>

        <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center">
            <img src="{{ asset('public/front/images/rectangle.png') }}" alt="" class="img-fluid rounded-4" style="max-width:85%; height: 95%;">
        </div>
    </div>
</div>

@include('include.footer')
