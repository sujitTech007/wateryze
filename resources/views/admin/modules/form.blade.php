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
                    @elseif ($fieldType === 'repeatable')
                        @php
                            $repeatableValues = old($field['name'], $oldValue ?? []);
                            $repeatableValues = is_array($repeatableValues) ? array_values($repeatableValues) : [];
                            if ($repeatableValues === []) {
                            $repeatableValues = [''];
                            }
                        @endphp
                        <fieldset class="col-12">
                            <legend class="form-label">{{ $field['label'] }}</legend>
                            <p class="form-text">Add up to 20 features. Leave a row empty to ignore it.</p>
                            <div class="repeatable-list" data-repeatable-list="{{ $field['name'] }}" data-repeatable-label="{{ $field['label'] }}" data-max-items="20">
                            @foreach ($repeatableValues as $value)
                                <div class="input-group mb-2 repeatable-row">
                                    <input class="form-control" type="text" name="{{ $field['name'] }}[]" value="{{ $value }}" maxlength="255" aria-label="{{ $field['label'] }} {{ $loop->iteration }}">
                                    <button class="btn btn-outline-danger" type="button" data-remove-repeatable @disabled($loop->first)>Remove</button>
                                </div>
                            @endforeach
                            </div>
                            <button class="btn btn-sm btn-outline-primary" type="button" data-add-repeatable="{{ $field['name'] }}">Add feature</button>
                            @error($field['name'])<div class="text-danger small">{{ $message }}</div>@enderror
                            @error($field['name'].'.*')<div class="text-danger small">{{ $message }}</div>@enderror
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

<script>
    document.querySelectorAll('[data-repeatable-list]').forEach(list => {
        const fieldName = list.dataset.repeatableList;
        const addButton = document.querySelector(`[data-add-repeatable="${fieldName}"]`);
        const maxItems = Number(list.dataset.maxItems);

        function updateRows() {
            const rows = [...list.querySelectorAll('.repeatable-row')];
            rows.forEach(row => {
                row.querySelector('[data-remove-repeatable]').disabled = rows.length === 1;
            });
            addButton.disabled = rows.length >= maxItems;
        }

        addButton.addEventListener('click', () => {
            if (list.querySelectorAll('.repeatable-row').length >= maxItems) return;

            const row = document.createElement('div');
            row.className = 'input-group mb-2 repeatable-row';
            const input = document.createElement('input');
            input.className = 'form-control';
            input.type = 'text';
            input.name = `${fieldName}[]`;
            input.maxLength = 255;
            input.setAttribute('aria-label', `${list.dataset.repeatableLabel} feature`);
            const removeButton = document.createElement('button');
            removeButton.className = 'btn btn-outline-danger';
            removeButton.type = 'button';
            removeButton.textContent = 'Remove';
            removeButton.dataset.removeRepeatable = '';
            row.append(input, removeButton);
            list.append(row);
            updateRows();
            input.focus();
        });

        list.addEventListener('click', event => {
            if (event.target.matches('[data-remove-repeatable]')) {
                event.target.closest('.repeatable-row').remove();
                updateRows();
            }
        });

        updateRows();
    });
</script>

@include('admin.include.footer')
