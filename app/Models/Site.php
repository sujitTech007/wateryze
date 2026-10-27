<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Site extends Model
{
    protected $fillable = [
        'name', 'site_code', 'facility_type', 'address', 'city', 'province',
        'postal_code', 'country', 'capacity', 'treatment_type', 'latitude', 'longitude',
    ];

    protected function casts(): array
    {
        return [
            'capacity' => 'decimal:2',
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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

    public function sensorApiConnections(): HasMany
    {
        return $this->hasMany(SensorApiConnection::class);
    }
}
