<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'country_code',
        'phone_country',
        'phone',
        'company',
        'industry',
        'address',
        'city',
        'province',
        'postal_code',
        'country',
        'settings',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'settings' => 'array',
        ];
    }

    public function sites(): HasMany
    {
        return $this->hasMany(Site::class);
    }

    public function waterReadings(): HasMany
    {
        return $this->hasMany(WaterReading::class);
    }

    public function chemicalUsages(): HasMany
    {
        return $this->hasMany(ChemicalUsage::class);
    }

    public function reminders(): HasMany
    {
        return $this->hasMany(Reminder::class);
    }

    public function dashboardNotifications(): HasMany
    {
        return $this->hasMany(DashboardNotification::class);
    }

    public function sensorApiConnections(): HasMany
    {
        return $this->hasMany(SensorApiConnection::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function paymentAttempts(): HasMany
    {
        return $this->hasMany(PaymentAttempt::class);
    }

    public function hasWaterMonitoringAccess(): bool
    {
        return $this->subscriptions()
            ->where('status', 'active')
            ->whereNotNull('payment_attempt_id')
            ->where('water_monitoring_enabled', true)
            ->whereHas('paymentAttempt', fn ($query) => $query->where('status', 'paid'))
            ->where(function ($query): void {
                $query->whereNull('end_date')
                    ->orWhereDate('end_date', '>=', now()->toDateString());
            })
            ->exists();
    }

    protected function fullPhone(): Attribute
    {
        return Attribute::get(fn () => trim(($this->country_code ?? '').' '.$this->phone));
    }
}
