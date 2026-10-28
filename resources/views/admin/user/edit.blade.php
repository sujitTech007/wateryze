@include('admin.include.header')

<div class="content-area">
    @include('admin.user._form', ['mode' => 'edit'])
</div>

@include('admin.include.footer')
