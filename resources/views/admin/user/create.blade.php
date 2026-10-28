@include('admin.include.header')

<div class="content-area">
    @include('admin.user._form', ['mode' => 'create'])
</div>

@include('admin.include.footer')
