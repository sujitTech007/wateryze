<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Invoice;
use App\Models\KitDelivery;
use App\Models\PartnerLab;
use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use App\Models\Technician;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdminOperationsController extends Controller
{
    public function index(Request $request): View
    {
        $module = $this->module($request);
        $query = $module['model']::query()->with($module['with'] ?? []);

        if ($request->filled('search')) {
            $search = $request->string('search')->trim()->toString();
            $query->where(function ($query) use ($module, $search): void {
                foreach ($module['search'] as $index => $column) {
                    $method = $index === 0 ? 'where' : 'orWhere';
                    $query->{$method}($column, 'like', '%'.$search.'%');
                }
            });
        }

        $records = $query->latest()->paginate(20)->withQueryString();

        return view('admin.modules.index', [
            'module' => $module,
            'records' => $records,
        ]);
    }

    public function create(Request $request): View
    {
        return $this->formView($request, null);
    }

    public function store(Request $request): RedirectResponse
    {
        $module = $this->module($request);
        $data = $this->validateRecord($request, $module);

        if ($module['key'] === 'invoices') {
            $data['total'] = $this->invoiceTotal($data);
            $data['paid_at'] = $data['status'] === 'paid' ? now() : null;
        }

        $module['model']::create($data);

        return redirect()->route($module['route'])
            ->with('status', $module['singular'].' created successfully.');
    }

    public function show(Request $request, int $record): View
    {
        $module = $this->module($request);
        $item = $module['model']::query()
            ->with($module['with'] ?? [])
            ->findOrFail($record);

        return view('admin.modules.view', compact('module', 'item'));
    }

    public function edit(Request $request, int $record): View
    {
        $module = $this->module($request);
        $item = $module['model']::query()->findOrFail($record);

        return $this->formView($request, $item);
    }

    public function update(Request $request, int $record): RedirectResponse
    {
        $module = $this->module($request);
        $item = $module['model']::query()->findOrFail($record);
        $data = $this->validateRecord($request, $module, $item);

        if ($module['key'] === 'invoices') {
            $data['total'] = $this->invoiceTotal($data);
            $data['paid_at'] = $data['status'] === 'paid' ? ($item->paid_at ?? now()) : null;
        }

        $item->update($data);

        return redirect()->route($module['route'])
            ->with('status', $module['singular'].' updated successfully.');
    }

    public function destroy(Request $request, int $record): RedirectResponse
    {
        $module = $this->module($request);
        $item = $module['model']::query()->findOrFail($record);

        if ($module['key'] === 'subscription-plans' && $item->subscriptions()->exists()) {
            return back()->withErrors([
                'record' => 'This plan is assigned to subscriptions and cannot be deleted.',
            ]);
        }

        $item->delete();

        return redirect()->route($module['route'])
            ->with('status', $module['singular'].' deleted successfully.');
    }

    private function formView(Request $request, ?Model $item): View
    {
        $module = $this->module($request);
        $options = [];

        foreach ($module['fields'] as $field) {
            if (($field['options_source'] ?? null) === 'users') {
                $options[$field['name']] = User::query()
                    ->whereNotIn('email', Admin::select('email'))
                    ->orderBy('email')
                    ->get()
                    ->mapWithKeys(fn (User $user): array => [
                        $user->id => trim(($user->first_name ?? '').' '.($user->last_name ?? '')) ?: $user->email,
                    ]);
            } elseif (($field['options_source'] ?? null) === 'plans') {
                $options[$field['name']] = SubscriptionPlan::query()
                    ->orderBy('name')
                    ->pluck('name', 'id');
            } elseif (($field['options_source'] ?? null) === 'subscriptions') {
                $options[$field['name']] = Subscription::query()
                    ->with('user')
                    ->latest()
                    ->get()
                    ->mapWithKeys(fn (Subscription $subscription): array => [
                        $subscription->id => '#'.$subscription->id.' — '.$subscription->user?->email,
                    ]);
            }
        }

        return view('admin.modules.form', [
            'module' => $module,
            'item' => $item,
            'options' => $options,
        ]);
    }

    private function validateRecord(Request $request, array $module, ?Model $item = null): array
    {
        $rules = [];

        foreach ($module['fields'] as $field) {
            if (($field['type'] ?? 'text') === 'checkbox') {
                $rules[$field['name']] = ['sometimes', 'boolean'];

                continue;
            }

            $fieldRules = $field['rules'] ?? ['nullable', 'string', 'max:255'];
            if (isset($field['unique'])) {
                $fieldRules[] = Rule::unique($module['table'], $field['name'])
                    ->ignore($item?->getKey());
            }
            if (isset($field['choices'])) {
                $fieldRules[] = Rule::in(array_keys($field['choices']));
            }
            if (($field['type'] ?? null) === 'multi-checkbox') {
                $rules[$field['name']] = $fieldRules;
                $rules[$field['name'].'.*'] = ['string', Rule::in(array_keys($field['choices']))];

                continue;
            }
            $rules[$field['name']] = $fieldRules;
        }

        $validator = Validator::make($request->all(), $rules);
        $validator->after(function ($validator) use ($request, $module): void {
            if (
                $module['key'] === 'invoices'
                && $request->filled('subscription_id')
                && $request->filled('user_id')
                && ! Subscription::query()
                    ->whereKey($request->input('subscription_id'))
                    ->where('user_id', $request->input('user_id'))
                    ->exists()
            ) {
                $validator->errors()->add('subscription_id', 'The selected subscription must belong to the selected customer.');
            }

            if ($module['key'] === 'invoices') {
                $amountCents = (int) round((float) $request->input('amount', 0) * 100);
                $taxCents = (int) round((float) $request->input('tax_amount', 0) * 100);
                if ($amountCents + $taxCents > 9_999_999_999) {
                    $validator->errors()->add('tax_amount', 'The invoice total cannot exceed 99,999,999.99.');
                }
            }
        });
        $data = $validator->validate();

        foreach ($module['fields'] as $field) {
            if (($field['type'] ?? null) === 'checkbox') {
                $data[$field['name']] = $request->boolean($field['name']);
            } elseif (($field['type'] ?? null) === 'multi-checkbox') {
                $data[$field['name']] = $request->input($field['name'], []);
            }
        }

        return $data;
    }

    private function invoiceTotal(array $data): string
    {
        $amountCents = (int) round((float) $data['amount'] * 100);
        $taxCents = (int) round((float) ($data['tax_amount'] ?? 0) * 100);

        return number_format(($amountCents + $taxCents) / 100, 2, '.', '');
    }

    private function module(Request $request): array
    {
        $key = $request->route('module');
        $modules = $this->modules();
        abort_unless(is_string($key) && isset($modules[$key]), 404);

        return $modules[$key];
    }

    private function modules(): array
    {
        $selectRules = [
            'required',
            'integer',
            Rule::exists('users', 'id')->whereNotIn('email', Admin::query()->pluck('email')->all()),
        ];

        return [
            'kit-deliveries' => [
                'key' => 'kit-deliveries',
                'table' => 'kit_deliveries',
                'model' => KitDelivery::class,
                'route' => 'admin.kit-delivery',
                'title' => 'Kit deliveries',
                'singular' => 'Kit delivery',
                'with' => ['user'],
                'search' => ['kit_type', 'tracking_number', 'status'],
                'columns' => ['user_id', 'kit_type', 'quantity', 'delivery_date', 'status', 'tracking_number'],
                'fields' => [
                    ['name' => 'user_id', 'label' => 'Customer', 'type' => 'select', 'options_source' => 'users', 'rules' => $selectRules],
                    ['name' => 'contact_person', 'label' => 'Contact person', 'rules' => ['nullable', 'string', 'max:150']],
                    ['name' => 'contact_number', 'label' => 'Contact number', 'type' => 'tel', 'rules' => ['nullable', 'string', 'max:40']],
                    ['name' => 'delivery_address', 'label' => 'Delivery address', 'type' => 'textarea', 'rules' => ['required', 'string', 'max:255']],
                    ['name' => 'city', 'label' => 'City'],
                    ['name' => 'province', 'label' => 'Province'],
                    ['name' => 'kit_type', 'label' => 'Kit type', 'rules' => ['required', 'string', 'max:100'], 'choices' => ['Water Testing Kit' => 'Water Testing Kit', 'Chemical Testing Kit' => 'Chemical Testing Kit', 'Compliance Kit' => 'Compliance Kit']],
                    ['name' => 'quantity', 'label' => 'Quantity', 'type' => 'number', 'rules' => ['required', 'integer', 'min:1', 'max:100000']],
                    ['name' => 'delivery_date', 'label' => 'Delivery date', 'type' => 'date', 'rules' => ['required', 'date']],
                    ['name' => 'status', 'label' => 'Status', 'type' => 'select', 'rules' => ['required', 'string'], 'choices' => ['pending' => 'Pending', 'in_transit' => 'In transit', 'delivered' => 'Delivered', 'cancelled' => 'Cancelled']],
                    ['name' => 'tracking_number', 'label' => 'Tracking number', 'rules' => ['nullable', 'string', 'max:100']],
                    ['name' => 'carrier', 'label' => 'Carrier', 'type' => 'select', 'rules' => ['nullable', 'string'], 'choices' => ['Canada Post' => 'Canada Post', 'FedEx' => 'FedEx', 'UPS' => 'UPS', 'DHL' => 'DHL', 'Other' => 'Other']],
                    ['name' => 'notes', 'label' => 'Notes', 'type' => 'textarea', 'rules' => ['nullable', 'string', 'max:5000']],
                ],
            ],
            'subscription-plans' => [
                'key' => 'subscription-plans',
                'table' => 'subscription_plans',
                'model' => SubscriptionPlan::class,
                'route' => 'admin.subscription-plans',
                'title' => 'Subscription plans',
                'singular' => 'Subscription plan',
                'search' => ['name', 'billing_cycle', 'status'],
                'columns' => ['name', 'amount', 'billing_cycle', 'status'],
                'fields' => [
                    ['name' => 'name', 'label' => 'Plan name', 'rules' => ['required', 'string', 'max:120'], 'unique' => true],
                    ['name' => 'description', 'label' => 'Description', 'type' => 'textarea', 'rules' => ['nullable', 'string', 'max:5000']],
                    ['name' => 'amount', 'label' => 'Amount', 'type' => 'number', 'rules' => ['required', 'numeric', 'min:0', 'max:99999999'], 'step' => '0.01'],
                    ['name' => 'billing_cycle', 'label' => 'Billing cycle', 'type' => 'select', 'rules' => ['required', 'string'], 'choices' => ['monthly' => 'Monthly', 'quarterly' => 'Quarterly', 'yearly' => 'Yearly']],
                    ['name' => 'status', 'label' => 'Status', 'type' => 'select', 'rules' => ['required', 'string'], 'choices' => ['active' => 'Active', 'inactive' => 'Inactive']],
                ],
            ],
            'subscriptions' => [
                'key' => 'subscriptions',
                'table' => 'subscriptions',
                'model' => Subscription::class,
                'route' => 'admin.subscriptions',
                'title' => 'Subscriptions',
                'singular' => 'Subscription',
                'with' => ['user', 'plan'],
                'search' => ['status', 'billing_cycle', 'payment_method'],
                'columns' => ['user_id', 'subscription_plan_id', 'amount', 'billing_cycle', 'renewal_date', 'status'],
                'fields' => [
                    ['name' => 'user_id', 'label' => 'Customer', 'type' => 'select', 'options_source' => 'users', 'rules' => $selectRules],
                    ['name' => 'subscription_plan_id', 'label' => 'Subscription plan', 'type' => 'select', 'options_source' => 'plans', 'rules' => ['required', 'integer', 'exists:subscription_plans,id']],
                    ['name' => 'billing_cycle', 'label' => 'Billing cycle', 'type' => 'select', 'rules' => ['required', 'string'], 'choices' => ['monthly' => 'Monthly', 'quarterly' => 'Quarterly', 'yearly' => 'Yearly']],
                    ['name' => 'amount', 'label' => 'Subscription amount', 'type' => 'number', 'rules' => ['required', 'numeric', 'min:0', 'max:99999999'], 'step' => '0.01'],
                    ['name' => 'start_date', 'label' => 'Start date', 'type' => 'date', 'rules' => ['required', 'date']],
                    ['name' => 'end_date', 'label' => 'End date', 'type' => 'date', 'rules' => ['nullable', 'date', 'after_or_equal:start_date']],
                    ['name' => 'renewal_date', 'label' => 'Renewal date', 'type' => 'date', 'rules' => ['nullable', 'date']],
                    ['name' => 'status', 'label' => 'Status', 'type' => 'select', 'rules' => ['required', 'string'], 'choices' => ['active' => 'Active', 'past_due' => 'Past due', 'cancelled' => 'Cancelled', 'paused' => 'Paused']],
                    ['name' => 'auto_renew', 'label' => 'Enable automatic renewal', 'type' => 'checkbox'],
                    ['name' => 'payment_method', 'label' => 'Payment method', 'rules' => ['nullable', 'string', 'max:80']],
                    ['name' => 'notes', 'label' => 'Notes', 'type' => 'textarea', 'rules' => ['nullable', 'string', 'max:5000']],
                ],
            ],
            'invoices' => [
                'key' => 'invoices',
                'table' => 'invoices',
                'model' => Invoice::class,
                'route' => 'admin.billing',
                'title' => 'Billing and invoices',
                'singular' => 'Invoice',
                'with' => ['user', 'subscription'],
                'search' => ['invoice_number', 'billing_email', 'status'],
                'columns' => ['invoice_number', 'user_id', 'invoice_date', 'due_date', 'total', 'status'],
                'fields' => [
                    ['name' => 'user_id', 'label' => 'Customer', 'type' => 'select', 'options_source' => 'users', 'rules' => $selectRules],
                    ['name' => 'subscription_id', 'label' => 'Subscription (optional)', 'type' => 'select', 'options_source' => 'subscriptions', 'rules' => ['nullable', 'integer', 'exists:subscriptions,id']],
                    ['name' => 'invoice_number', 'label' => 'Invoice number', 'rules' => ['required', 'string', 'max:50'], 'unique' => true],
                    ['name' => 'invoice_date', 'label' => 'Invoice date', 'type' => 'date', 'rules' => ['required', 'date']],
                    ['name' => 'due_date', 'label' => 'Due date', 'type' => 'date', 'rules' => ['required', 'date', 'after_or_equal:invoice_date']],
                    ['name' => 'amount', 'label' => 'Subtotal', 'type' => 'number', 'rules' => ['required', 'numeric', 'min:0', 'max:99999999.99'], 'step' => '0.01'],
                    ['name' => 'tax_amount', 'label' => 'Tax', 'type' => 'number', 'rules' => ['nullable', 'numeric', 'min:0', 'max:99999999.99'], 'step' => '0.01'],
                    ['name' => 'status', 'label' => 'Status', 'type' => 'select', 'rules' => ['required', 'string'], 'choices' => ['pending' => 'Pending', 'paid' => 'Paid', 'overdue' => 'Overdue', 'cancelled' => 'Cancelled']],
                    ['name' => 'billing_email', 'label' => 'Billing email', 'type' => 'email', 'rules' => ['required', 'email', 'max:255']],
                    ['name' => 'phone', 'label' => 'Phone number', 'type' => 'tel', 'rules' => ['nullable', 'string', 'max:40']],
                    ['name' => 'billing_address', 'label' => 'Billing address', 'type' => 'textarea', 'rules' => ['nullable', 'string', 'max:255']],
                    ['name' => 'city', 'label' => 'City'],
                    ['name' => 'province', 'label' => 'Province'],
                    ['name' => 'postal_code', 'label' => 'Postal code', 'rules' => ['nullable', 'string', 'max:20']],
                    ['name' => 'notes', 'label' => 'Invoice notes', 'type' => 'textarea', 'rules' => ['nullable', 'string', 'max:5000']],
                ],
            ],
            'partner-labs' => [
                'key' => 'partner-labs',
                'table' => 'partner_labs',
                'model' => PartnerLab::class,
                'route' => 'admin.partner-labs',
                'title' => 'Partner laboratories',
                'singular' => 'Partner laboratory',
                'search' => ['lab_name', 'lab_type', 'email', 'status'],
                'columns' => ['lab_name', 'lab_type', 'email', 'contact_person', 'status'],
                'fields' => [
                    ['name' => 'lab_name', 'label' => 'Laboratory name', 'rules' => ['required', 'string', 'max:180']],
                    ['name' => 'lab_type', 'label' => 'Laboratory type', 'type' => 'select', 'rules' => ['required', 'string'], 'choices' => ['Water Testing Laboratory' => 'Water Testing Laboratory', 'Environmental Testing' => 'Environmental Testing', 'Compliance Laboratory' => 'Compliance Laboratory', 'Chemical Testing Laboratory' => 'Chemical Testing Laboratory', 'Other' => 'Other']],
                    ['name' => 'registration_number', 'label' => 'Registration number', 'rules' => ['nullable', 'string', 'max:100'], 'unique' => true],
                    ['name' => 'website', 'label' => 'Website', 'type' => 'url', 'rules' => ['nullable', 'url', 'max:255']],
                    ['name' => 'email', 'label' => 'Laboratory email', 'type' => 'email', 'rules' => ['required', 'email', 'max:255']],
                    ['name' => 'contact_person', 'label' => 'Contact person', 'rules' => ['required', 'string', 'max:150']],
                    ['name' => 'phone', 'label' => 'Contact phone', 'type' => 'tel', 'rules' => ['required', 'string', 'max:40']],
                    ['name' => 'contact_email', 'label' => 'Contact email', 'type' => 'email', 'rules' => ['nullable', 'email', 'max:255']],
                    ['name' => 'position', 'label' => 'Position / role'],
                    ['name' => 'address', 'label' => 'Address'],
                    ['name' => 'city', 'label' => 'City'],
                    ['name' => 'province', 'label' => 'Province'],
                    ['name' => 'postal_code', 'label' => 'Postal code', 'rules' => ['nullable', 'string', 'max:20']],
                    ['name' => 'country', 'label' => 'Country', 'rules' => ['required', 'string', 'max:100']],
                    ['name' => 'status', 'label' => 'Status', 'type' => 'select', 'rules' => ['required', 'string'], 'choices' => ['active' => 'Active', 'inactive' => 'Inactive', 'rejected' => 'Rejected']],
                    ['name' => 'services', 'label' => 'Services offered', 'type' => 'multi-checkbox', 'choices' => ['Water Testing' => 'Water Testing', 'Environmental Testing' => 'Environmental Testing', 'Compliance Testing' => 'Compliance Testing', 'Chemical Analysis' => 'Chemical Analysis'], 'rules' => ['nullable', 'array']],
                    ['name' => 'notes', 'label' => 'Notes', 'type' => 'textarea', 'rules' => ['nullable', 'string', 'max:5000']],
                ],
            ],
            'technicians' => [
                'key' => 'technicians',
                'table' => 'technicians',
                'model' => Technician::class,
                'route' => 'admin.technicians',
                'title' => 'Technicians',
                'singular' => 'Technician',
                'search' => ['first_name', 'last_name', 'email', 'employee_id'],
                'columns' => ['first_name', 'last_name', 'email', 'job_title', 'availability', 'employment_status'],
                'fields' => [
                    ['name' => 'first_name', 'label' => 'First name', 'rules' => ['required', 'string', 'max:100']],
                    ['name' => 'last_name', 'label' => 'Last name', 'rules' => ['required', 'string', 'max:100']],
                    ['name' => 'email', 'label' => 'Email address', 'type' => 'email', 'rules' => ['required', 'email', 'max:255'], 'unique' => true],
                    ['name' => 'phone', 'label' => 'Phone number', 'type' => 'tel', 'rules' => ['required', 'string', 'max:40']],
                    ['name' => 'date_of_birth', 'label' => 'Date of birth', 'type' => 'date', 'rules' => ['nullable', 'date', 'before:today']],
                    ['name' => 'employee_id', 'label' => 'Employee ID', 'rules' => ['nullable', 'string', 'max:50'], 'unique' => true],
                    ['name' => 'address', 'label' => 'Address', 'type' => 'textarea'],
                    ['name' => 'city', 'label' => 'City'],
                    ['name' => 'province', 'label' => 'Province'],
                    ['name' => 'postal_code', 'label' => 'Postal code', 'rules' => ['nullable', 'string', 'max:20']],
                    ['name' => 'country', 'label' => 'Country', 'rules' => ['required', 'string', 'max:100']],
                    ['name' => 'service_area', 'label' => 'Service area', 'type' => 'select', 'rules' => ['nullable', 'string'], 'choices' => ['Water Testing' => 'Water Testing', 'Wastewater Treatment' => 'Wastewater Treatment', 'Water Quality Inspection' => 'Water Quality Inspection', 'Compliance Inspection' => 'Compliance Inspection', 'Equipment Maintenance' => 'Equipment Maintenance']],
                    ['name' => 'job_title', 'label' => 'Job title'],
                    ['name' => 'years_experience', 'label' => 'Years of experience', 'type' => 'number', 'rules' => ['nullable', 'integer', 'min:0', 'max:80']],
                    ['name' => 'availability', 'label' => 'Availability', 'type' => 'select', 'rules' => ['required', 'string'], 'choices' => ['available' => 'Available', 'unavailable' => 'Unavailable', 'on_leave' => 'On leave']],
                    ['name' => 'employment_status', 'label' => 'Employment status', 'type' => 'select', 'rules' => ['required', 'string'], 'choices' => ['active' => 'Active', 'inactive' => 'Inactive']],
                    ['name' => 'certification_status', 'label' => 'Certification status', 'type' => 'select', 'rules' => ['required', 'string'], 'choices' => ['pending' => 'Pending', 'verified' => 'Verified', 'rejected' => 'Rejected']],
                    ['name' => 'hire_date', 'label' => 'Hire date', 'type' => 'date', 'rules' => ['nullable', 'date', 'before_or_equal:today']],
                    ['name' => 'notes', 'label' => 'Notes', 'type' => 'textarea', 'rules' => ['nullable', 'string', 'max:5000']],
                ],
            ],
        ];
    }
}
