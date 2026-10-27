@include('admin.include.header')

<div class="content-area">
    <div class="mb-4">
        <h1 class="page-title mb-1">Administrator profile</h1>
        <p class="text-muted mb-0">Update the name and email address associated with this administrator account.</p>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="status">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.profile.update') }}" class="card border-0 shadow-sm">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" id="name" name="name" type="text" maxlength="255" value="{{ old('name', auth('admin')->user()->name) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email address</label>
                <input class="form-control" id="email" name="email" type="email" maxlength="255" value="{{ old('email', auth('admin')->user()->email) }}" required>
            </div>
            <button class="btn btn-primary" type="submit">Save profile</button>
        </div>
    </form>
</div>

@include('admin.include.footer')
