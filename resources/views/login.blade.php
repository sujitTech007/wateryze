@include('include.header')


    <div class="container min-vh-100 d-flex align-items-center justify-content-center mt-5">
        <div class="row shadow-lg rounded-4 overflow-hidden" style="width: 100%; background:#fff; border-radius: 8px;">

            <!-- LEFT -->
            <div class="col-md-6 p-5">
                <h3 class="fw-bold mb-1">Login</h3>
                <p class="text-muted mb-4">Login to access account</p>

                <form action="#">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" value="William@gmail.com">
                    </div>

                    <div class="mb-3 position-relative">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" value="password">
                        <span style="position:absolute; right:12px; top:38px; cursor:pointer;">👁</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox">
                            <label class="form-check-label">Remember me</label>
                        </div>
                        <a href="#" class="text-decoration-none">Forgot Password</a>
                    </div>



                    <button class="login w-100  py-2 mb-3 text-white"
                        style="background: #2f6db5; border-radius: 8px; border: 1px;">
                        Login
                    </button>
                </form>

                <p class="text-center small">
                    Don’t have an account? <a href="{{ route('signup') }}">Sign up</a>
                </p>

                <div class="text-center text-muted my-1">
                    ─── Or login with ───
                </div>

                <div class="row g-3 mt-1">
                    <div class="col-4">
                        <button class="btn w-100 d-flex align-items-center justify-content-center"
                            style="border:1.5px solid #2f6db5; height:56px; border-radius:10px; background:#fff;">
                            <i class="fab fa-facebook-f text-primary fs-4"></i>
                        </button>
                    </div>

                    <div class="col-4">
                        <button class="btn w-100 d-flex align-items-center justify-content-center"
                            style="border:1.5px solid #2f6db5; height:56px; border-radius:10px; background:#fff;">
                            <i class="fab fa-google fs-4" style="color:#DB4437;"></i>
                        </button>
                    </div>

                    <div class="col-4">
                        <button class="btn w-100 d-flex align-items-center justify-content-center"
                            style="border:1.5px solid #2f6db5; height:56px; border-radius:10px; background:#fff;">
                            <i class="fab fa-apple fs-4 text-dark"></i>
                        </button>
                    </div>
                </div>

            </div>

            <!-- RIGHT IMAGE -->
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center">
                <img src="images/rectangle.png" class="img-fluid rounded-4" style="max-width:85%; height: 95%;">
            </div>

        </div>
    </div>


@include('include.footer')