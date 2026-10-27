<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        if (! Schema::hasColumn('users', 'role')) {
            return;
        }

        DB::table('users')
            ->where('role', 'admin')
            ->orderBy('id')
            ->chunkById(100, function ($users): void {
                foreach ($users as $user) {
                    $name = trim(($user->first_name ?? '').' '.($user->last_name ?? ''));
                    $name = $name !== '' ? $name : ($user->name ?? $user->email);

                    DB::table('admins')->insertOrIgnore([
                        'name' => $name,
                        'email' => mb_strtolower($user->email),
                        'password' => $user->password,
                        'created_at' => $user->created_at ?? now(),
                        'updated_at' => $user->updated_at ?? now(),
                    ]);

                    DB::table('users')
                        ->where('id', $user->id)
                        ->update(['role' => 'user']);
                }
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
