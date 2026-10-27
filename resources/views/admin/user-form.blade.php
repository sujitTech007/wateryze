<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wateryze | {{ $user ? 'Edit account' : 'Create account' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<main class="container py-5" style="max-width: 850px">
    <a href="{{ route('admin.users.index') }}" class="text-decoration-none">← Accounts</a>
    <h1 class="h2 mt-2 mb-1">{{ $user ? 'Edit account' : 'Create account' }}</h1>
    <p class="text-muted">This form creates and edits customer user accounts. Administrator accounts are maintained separately.</p>
    @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
    <form action="{{ $user ? route('admin.users.update', $user) : route('admin.users.store') }}" method="POST" class="card border-0 shadow-sm">
        @csrf
        @if ($user) @method('PUT') @endif
        <div class="card-body row g-3">
            <div class="col-md-6"><label class="form-label" for="first_name">First name</label><input class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $user?->first_name) }}" maxlength="100" required></div>
            <div class="col-md-6"><label class="form-label" for="last_name">Last name</label><input class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user?->last_name) }}" maxlength="100" required></div>
            <div class="col-md-6"><label class="form-label" for="email">Email</label><input class="form-control" id="email" type="email" name="email" value="{{ old('email', $user?->email) }}" required></div>
            <div class="col-md-3"><label class="form-label" for="country_code">Phone country code</label><input class="form-control" id="country_code" name="country_code" value="{{ old('country_code', $user?->country_code) }}" placeholder="+1"></div>
            <div class="col-md-3"><label class="form-label" for="phone">Phone</label><input class="form-control" id="phone" name="phone" value="{{ old('phone', $user?->phone) }}"></div>
            <div class="col-md-6"><label class="form-label" for="company">Company</label><input class="form-control" id="company" name="company" value="{{ old('company', $user?->company) }}" maxlength="255"></div>
            <div class="col-md-6"><label class="form-label" for="industry">Industry</label><input class="form-control" id="industry" name="industry" value="{{ old('industry', $user?->industry) }}" maxlength="255"></div>
            <div class="col-md-6"><label class="form-label" for="password">Password @if (! $user)<span class="text-danger">*</span>@else<small class="text-muted">(leave blank to keep current)</small>@endif</label><input class="form-control" id="password" type="password" name="password" autocomplete="new-password" @required(! $user)></div>
            <div class="col-md-6"><label class="form-label" for="password_confirmation">Confirm password</label><input class="form-control" id="password_confirmation" type="password" name="password_confirmation" autocomplete="new-password" @required(! $user)></div>
        </div>
        <div class="card-footer bg-white d-flex gap-2"><button class="btn btn-primary" type="submit">{{ $user ? 'Save account' : 'Create account' }}</button><a class="btn btn-outline-secondary" href="{{ route('admin.users.index') }}">Cancel</a></div>
    </form>
</main>
</body>
</html>
