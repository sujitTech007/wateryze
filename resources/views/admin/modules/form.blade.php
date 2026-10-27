@include('admin.include.header')

<div class="content-area">
    <div class="mb-4">
        <a href="{{ route($module['route']) }}" class="text-decoration-none">← {{ $module['title'] }}</a>
        <h1 class="page-title mt-2 mb-1">{{ $item ? 'Edit' : 'Create' }} {{ $module['singular'] }}</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ $item ? route($module['route'].'.update', $item) : route($module['route'].'.store') }}" class="card border-0 shadow-sm">
        @csrf
        @if ($item) @method('PUT') @endif
        <div class="card-body">
            <div class="row g-3">
                @foreach ($module['fields'] as $field)
                    @php
                        $fieldType = $field['type'] ?? 'text';
                        $oldValue = old($field['name'], $item?->{$field['name']});
                        if ($oldValue instanceof \Carbon\CarbonInterface) {
                            $oldValue = $oldValue->format('Y-m-d');
                        }
                    @endphp
                    @if ($fieldType === 'checkbox')
                        <div class="col-md-6">
                            <div class="form-check mt-4">
                                <input class="form-check-input" id="{{ $field['name'] }}" type="checkbox" name="{{ $field['name'] }}" value="1" @checked((bool) $oldValue)>
                                <label class="form-check-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                            </div>
                        </div>
                    @elseif ($fieldType === 'multi-checkbox')
                        <fieldset class="col-12">
                            <legend class="form-label">{{ $field['label'] }}</legend>
                            @foreach ($field['choices'] as $value => $label)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="{{ $field['name'].'_'.$loop->index }}" type="checkbox" name="{{ $field['name'] }}[]" value="{{ $value }}" @checked(in_array($value, old($field['name'], $oldValue ?? []), true))>
                                    <label class="form-check-label" for="{{ $field['name'].'_'.$loop->index }}">{{ $label }}</label>
                                </div>
                            @endforeach
                        </fieldset>
                    @else
                        <div class="{{ $fieldType === 'textarea' ? 'col-12' : 'col-md-6' }}">
                            <label class="form-label" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                            @if ($fieldType === 'textarea')
                                <textarea class="form-control" id="{{ $field['name'] }}" name="{{ $field['name'] }}" rows="3" maxlength="5000">{{ $oldValue }}</textarea>
                            @elseif ($fieldType === 'select')
                                @php
                                    $fieldOptions = $field['choices'] ?? ($options[$field['name']] ?? collect());
                                    $isRequired = in_array('required', $field['rules'] ?? [], true);
                                @endphp
                                <select class="form-select" id="{{ $field['name'] }}" name="{{ $field['name'] }}" @required($isRequired)>
                                    @if (! $isRequired)<option value="">Select an option</option>@endif
                                    @foreach ($fieldOptions as $value => $label)
                                        <option value="{{ $value }}" @selected((string) $oldValue === (string) $value)>{{ $label }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input class="form-control" id="{{ $field['name'] }}" type="{{ $fieldType }}" name="{{ $field['name'] }}" value="{{ $oldValue }}" @if (isset($field['step'])) step="{{ $field['step'] }}" @endif @required(in_array('required', $field['rules'] ?? [], true))>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="card-footer bg-white d-flex gap-2">
            <button class="btn btn-primary" type="submit">{{ $item ? 'Save changes' : 'Create '.$module['singular'] }}</button>
            <a class="btn btn-outline-secondary" href="{{ route($module['route']) }}">Cancel</a>
        </div>
    </form>
</div>

@include('admin.include.footer')
