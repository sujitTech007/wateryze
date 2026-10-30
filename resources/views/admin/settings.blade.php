@include('admin.include.header')

<div class="content-area">
    <div class="mb-4">
        <h1 class="page-title mb-1">Administrator settings</h1>
        <p class="text-muted mb-0">Manage support contact details, regional preferences, notifications, and account security.</p>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <section class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white"><h2 class="h5 mb-0">Security settings</h2></div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.settings.password') }}">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label" for="current_password">Current password</label>
                        <input class="form-control" id="current_password" name="current_password" type="password" autocomplete="current-password" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="password">New password</label>
                        <input class="form-control" id="password" name="password" type="password" autocomplete="new-password" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="password_confirmation">Confirm new password</label>
                        <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required>
                    </div>
                </div>
                <button class="btn btn-primary mt-3" type="submit">Update password</button>
            </form>
        </div>
        <div class="card-footer bg-white">
            <h3 class="h6 mb-1">Two-factor authentication</h3>
            <p class="text-muted mb-0">Two-factor authentication is not configured for administrator accounts.</p>
        </div>
    </section>

    <section class="card border-0 shadow-sm">
        <div class="card-header bg-white"><h2 class="h5 mb-0">Active session</h2></div>
        <div class="card-body">
            <p class="mb-1">Current administrator session</p>
            <p class="text-muted mb-0">Authenticated as {{ auth('admin')->user()->email }}.</p>
        </div>
    </section>
</div>

@include('admin.include.footer')
