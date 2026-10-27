<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AdminAccountController extends Controller
{
    public function profile(): View
    {
        return view('admin.profile');
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        /** @var Admin $admin */
        $admin = $request->user('admin');
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('admins', 'email')->ignore($admin->id)],
        ]);

        $admin->update($data);

        return back()->with('status', 'Administrator profile updated.');
    }

    public function settings(): View
    {
        $settings = AdminSetting::query()->firstOrCreate(['id' => 1]);

        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'support_email' => ['nullable', 'email', 'max:255'],
            'contact_phone' => ['nullable', 'string', 'max:40'],
            'timezone' => ['required', 'timezone'],
            'language' => ['required', Rule::in(['en', 'fr', 'es'])],
            'email_notifications' => ['sometimes', 'boolean'],
            'sms_notifications' => ['sometimes', 'boolean'],
        ]);

        $data['email_notifications'] = $request->boolean('email_notifications');
        $data['sms_notifications'] = $request->boolean('sms_notifications');
        AdminSetting::query()->updateOrCreate(['id' => 1], $data);

        return back()->with('status', 'Administrator settings saved.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        /** @var Admin $admin */
        $admin = $request->user('admin');
        $data = $request->validate([
            'current_password' => ['required', 'current_password:admin'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $admin->update(['password' => $data['password']]);

        return back()->with('status', 'Administrator password updated.');
    }
}
