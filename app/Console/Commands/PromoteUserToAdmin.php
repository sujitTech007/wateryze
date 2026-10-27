<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Console\Command;

class PromoteUserToAdmin extends Command
{
    protected $signature = 'wateryze:promote-admin {email} {--force : Skip the confirmation prompt}';

    protected $description = 'Create a separate administrator login from an existing user account';

    public function handle(): int
    {
        $email = mb_strtolower(trim($this->argument('email')));
        $user = User::where('email', $email)->first();

        if (Admin::where('email', $email)->exists()) {
            $this->info($email.' already has a separate administrator login.');

            return self::SUCCESS;
        }

        if ($user === null) {
            $this->error('No account exists for '.$email.'. Create a user account before promoting it.');

            return self::FAILURE;
        }

        if (! $this->option('force') && ! $this->confirm('Create a separate administrator login for '.$user->email.'?')) {
            $this->comment('No changes were made.');

            return self::SUCCESS;
        }

        $name = trim(($user->first_name ?? '').' '.($user->last_name ?? ''));
        Admin::create([
            'name' => $name !== '' ? $name : ($user->name ?? $user->email),
            'email' => $user->email,
            'password' => $user->getRawOriginal('password'),
        ]);
        if ($user->role !== 'user') {
            $user->forceFill(['role' => 'user'])->save();
        }

        $this->info($user->email.' now has a separate administrator login. Its user login is disabled.');

        return self::SUCCESS;
    }
}
