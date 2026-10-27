<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wateryze | Administrator login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../images/favicon.png" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-light">

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-lg-5 col-md-7 col-sm-10 bg-white shadow-lg rounded-4 p-5">

        <h3 class="fw-bold mb-1">Admin Login</h3>
        <p class="text-muted mb-4">Sign in with your administrator account.</p>

        @if (session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
        @if ($errors->any())<div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>@endif

        <form method="POST" action="{{ route('admin.login.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" autocomplete="username" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input id="password" type="password" name="password" class="form-control" autocomplete="current-password" required>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" id="remember" type="checkbox" name="remember" value="1">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button class="btn w-100 py-2 text-white" style="background:#2f6db5; border-radius:8px;">Log in</button>
        </form>

    </div>
</div>

</body>
</html>