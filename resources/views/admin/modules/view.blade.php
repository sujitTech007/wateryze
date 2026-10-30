@include('admin.include.header')

<div class="content-area">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <a href="{{ route($module['route']) }}" class="text-decoration-none">← {{ $module['title'] }}</a>
            <h1 class="page-title mt-2 mb-0">{{ $module['singular'] }} details</h1>
        </div>
        <a class="btn btn-primary" href="{{ route($module['route'].'.edit', $item) }}" aria-label="Edit {{ strtolower($module['singular']) }}" title="Edit">
            <i class="fas fa-pen" aria-hidden="true"></i>
        </a>
    </div>

    <section class="card border-0 shadow-sm">
        <dl class="row g-0 mb-0">
            @foreach ($module['fields'] as $field)
                @php
                    $value = match ($field['name']) {
                        'user_id' => $item->user?->email ?? 'Customer removed',
                        'subscription_plan_id' => $item->plan?->name ?? 'Plan removed',
                        'subscription_id' => $item->subscription?->id ? '#'.$item->subscription->id : '—',
                        default => $item->{$field['name']},
                    };
                    if ($value instanceof \Carbon\CarbonInterface) {
                        $value = $value->format(in_array($field['type'] ?? '', ['date'], true) ? 'M j, Y' : 'M j, Y H:i');
                    } elseif (is_array($value)) {
                        $value = implode(', ', $value);
                    } elseif (is_bool($value)) {
                        $value = $value ? 'Yes' : 'No';
                    }
                @endphp
                <div class="col-md-6 p-3 border-bottom">
                    <dt class="text-muted small">{{ $field['label'] }}</dt>
                    @if (($field['type'] ?? null) === 'repeatable' && is_array($value))
                        @if ($value === [])
                            <dd class="mb-0">No features added</dd>
                        @else
                            <dd class="mb-0">
                                <ul class="mb-0 ps-3">
                                    @foreach ($value as $feature)
                                        <li>{{ $feature }}</li>
                                    @endforeach
                                </ul>
                            </dd>
                        @endif
                    @else
                        <dd class="mb-0">{{ $value ?? '—' }}</dd>
                    @endif
                </div>
            @endforeach
            @if ($module['key'] === 'invoices')
                <div class="col-md-6 p-3 border-bottom"><dt class="text-muted small">Calculated total</dt><dd class="mb-0">{{ $item->total }}</dd></div>
            @endif
        </dl>
    </section>
</div>

@include('admin.include.footer')
