@include('include.header')

    <div class="container min-vh-100 d-flex align-items-center justify-content-center mt-5">
        <div class="row shadow-lg rounded-4 overflow-hidden mt-5 mb-5" style="max-width:100%; background:#fff;">

            <!-- LEFT FORM -->
            <div class="col-md-6 p-5">
                <h3 class="fw-bold mb-1">Sign up</h3>
                <p class="text-muted mb-4">Sign up to access your personal account.</p>
<form action="#">
                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0 ">First Name</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Last Name</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Email</label>
                        <input type="email" class="form-control">
                    </div>

                    <div class="col-md-6 mb-2">
                        <label class="form-label mb-0">Phone Number</label>
                        <input type="tel" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                <div class="mb-2 position-relative">
                    <label class="form-label mb-0">Password</label>
                    <input type="password" class="form-control">
                    <span style="position:absolute; right:12px; top:38px; cursor:pointer;">👁</span>
                </div>
                </div>
<div class="col-md-6">
                <div class="mb-2 position-relative">
                    <label class="form-label mb-0">Confirm Password</label>
                    <input type="password" class="form-control">
                    <span style="position:absolute; right:12px; top:38px; cursor:pointer;">👁</span>
                </div>
                </div>
                </div>

                <div class="form-check mb-4 mt-2">
                    <input class="form-check-input" type="checkbox">
                    <label class="form-check-label" style="font-size: 14px;">
                        I agree to all the <a href="{{ route('terms') }}">Terms</a> and
                        <a href="{{ route('terms') }}">Privacy Policies</a>
                    </label>
                </div>
                </form>

                <button class="w-100 py-2 mb-1" style="background:#2f6db5; border:none; color:#fff;
                border-radius:8px; font-weight:600;">
                    Create account
                </button>

                <p class="text-center small">
                    Already have an account? <a href="{{ route('login') }}">Login</a>
                </p>

                <div class="text-center text-muted my-1">
                    Or Sign up with
                </div>

                <div class="row g-3">
                    <div class="col-4">
                        <button class="btn w-100" style="border:1px solid #ccc; height:46px; border-radius:8px;">
                            <i class="fab fa-facebook-f text-primary"></i>
                        </button>
                    </div>

                    <div class="col-4">
                        <button class="btn w-100" style="border:1px solid #ccc; height:46px; border-radius:8px;">
                            <i class="fab fa-google" style="color:#DB4437;"></i>
                        </button>
                    </div>

                    <div class="col-4">
                        <button class="btn w-100" style="border:1px solid #ccc; height:46px; border-radius:8px;">
                            <i class="fab fa-apple text-dark"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- RIGHT IMAGE -->
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center p-4">
                <img src="images/signup.png" class="img-fluid rounded-4" style="height:100%; object-fit:cover;">
            </div>
        </div>
    </div>

@include('include.footer')