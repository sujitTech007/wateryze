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
        <div class="card-header bg-white"><h2 class="h5 mb-0">General and regional settings</h2></div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.settings.update') }}">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="platform_name">Platform name</label>
                        <input class="form-control" id="platform_name" value="Wateryze" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="version">Version</label>
                        <input class="form-control" id="version" value="v2.1.0" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="support_email">Support email</label>
                        <input class="form-control" id="support_email" name="support_email" type="email" maxlength="255" value="{{ old('support_email', $settings->support_email) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="contact_phone">Contact phone</label>
                        <input class="form-control" id="contact_phone" name="contact_phone" type="tel" maxlength="40" value="{{ old('contact_phone', $settings->contact_phone) }}" data-phone-picker>
                        <div class="text-danger small" data-phone-error role="alert"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="timezone">Timezone</label>
                        <select class="form-select" id="timezone" name="timezone" required>
                            @foreach (timezone_identifiers_list() as $timezone)
                                <option value="{{ $timezone }}" @selected(old('timezone', $settings->timezone) === $timezone)>{{ $timezone }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="language">Language</label>
                        <select class="form-select" id="language" name="language" required>
                            @foreach (['en' => 'English', 'fr' => 'French', 'es' => 'Spanish'] as $code => $label)
                                <option value="{{ $code }}" @selected(old('language', $settings->language) === $code)>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <h3 class="h6 mt-2">Notifications</h3>
                        <div class="form-check mb-2">
                            <input type="hidden" name="email_notifications" value="0">
                            <input class="form-check-input" id="email_notifications" name="email_notifications" type="checkbox" value="1" @checked(old('email_notifications', $settings->email_notifications))>
                            <label class="form-check-label p-1" for="email_notifications">Email notifications</label>
                        </div>
                        <div class="form-check">
                            <input type="hidden" name="sms_notifications" value="0">
                            <input class="form-check-input" id="sms_notifications" name="sms_notifications" type="checkbox" value="1" @checked(old('sms_notifications', $settings->sms_notifications))>
                            <label class="form-check-label p-1" for="sms_notifications">SMS notifications</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mt-3" type="submit">Save settings</button>
            </form>
        </div>
    </section>

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
