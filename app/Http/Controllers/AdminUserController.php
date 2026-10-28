<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    public function index(Request $request): View
    {
        $users = $this->customers()
            ->when($request->filled('search'), function ($query) use ($request): void {
                $search = $request->string('search')->trim()->toString();
                $query->where(function ($query) use ($search): void {
                    $query->where('first_name', 'like', '%'.$search.'%')
                        ->orWhere('last_name', 'like', '%'.$search.'%')
                        ->orWhere('name', 'like', '%'.$search.'%')
                        ->orWhere('email', 'like', '%'.$search.'%')
                        ->orWhere('phone', 'like', '%'.$search.'%')
                        ->orWhere('company', 'like', '%'.$search.'%');
                });
            })
            ->withCount(['sites', 'waterReadings'])
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.user.index', compact('users'));
    }

    public function create(): View
    {
        return view('admin.user.create', ['user' => null]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateUser($request, creating: true);
        $data['name'] = trim($data['first_name'].' '.$data['last_name']);
        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.users.index')->with('status', 'Customer account created.');
    }

    public function show(int $user): View
    {
        $customer = $this->customer($user)
            ->loadCount(['sites', 'waterReadings', 'chemicalUsages', 'reminders']);

        return view('admin.user.view', ['user' => $customer]);
    }

    public function edit(int $user): View
    {
        return view('admin.user.edit', ['user' => $this->customer($user)]);
    }

    public function update(Request $request, int $user): RedirectResponse
    {
        $customer = $this->customer($user);
        $data = $this->validateUser($request, creating: false, user: $customer);
        $data['name'] = trim($data['first_name'].' '.$data['last_name']);

        if (filled($data['password'] ?? null)) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $customer->update($data);

        return redirect()->route('admin.users.index')->with('status', 'Customer account updated.');
    }

    public function destroy(int $user): RedirectResponse
    {
        $customer = $this->customer($user);
        $customer->delete();

        return redirect()->route('admin.users.index')
            ->with('status', 'Customer account and its associated data deleted.');
    }

    private function customers(): Builder
    {
        return User::query()
            ->where('role', 'user')
            ->whereNotIn('email', Admin::query()->select('email'));
    }

    private function customer(int $id): User
    {
        return $this->customers()->findOrFail($id);
    }

    private function validateUser(Request $request, bool $creating, ?User $user = null): array
    {
        if (is_string($request->input('email'))) {
            $request->merge(['email' => mb_strtolower(trim($request->input('email')))]);
        }

        $emailRule = Rule::unique('users', 'email');
        if ($user !== null) {
            $emailRule->ignore($user->id);
        }

        return $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => [
                'required',
                'email',
                'max:255',
                $emailRule,
                Rule::unique('admins', 'email'),
            ],
            'country_code' => ['nullable', 'required_with:phone', 'string', 'regex:/^\+[1-9][0-9]{0,2}$/'],
            'phone_country' => ['nullable', 'required_with:phone', 'string', 'regex:/^[a-z]{2}$/'],
            'phone' => ['nullable', 'string', 'max:30', 'regex:/^(?=(?:\D*\d){4,15}$)[0-9().\-\s]+$/'],
            'company' => ['nullable', 'string', 'max:255'],
            'industry' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'province' => ['nullable', 'string', 'max:100'],
            'postal_code' => ['nullable', 'string', 'max:20'],
            'country' => ['nullable', 'string', 'max:100'],
            'password' => [$creating ? 'required' : 'nullable', 'confirmed', Password::min(8)],
        ]);
    }
}
