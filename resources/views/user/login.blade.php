<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wateryze - Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../images/favicon.png" type="image/x-icon">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-light">

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-lg-5 col-md-7 col-sm-10 bg-white shadow-lg rounded-4 p-5">

        <h3 class="fw-bold mb-1">User Login</h3>
        <p class="text-muted mb-4">Login to access account</p>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="William@gmail.com">
        </div>

        <div class="mb-3 position-relative">
            <label class="form-label">Password</label>
            <input type="password" class="form-control">
            <span class="position-absolute end-0 top-50 translate-middle-y me-3" style="cursor:pointer; margin-top: 12px;">👁</span>
        </div>

       
        <button class="btn w-100 py-2 mb-3 text-white"
            style="background:#2f6db5; border-radius:8px;">
            Login
        </button>

       

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>