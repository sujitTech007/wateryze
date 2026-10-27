<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SensorApiConnection extends Model
{
    protected $fillable = [
        'user_id',
        'site_id',
        'endpoint_url',
        'bearer_token',
        'parameter_map',
        'timestamp_path',
        'last_sample_hash',
        'last_synced_at',
        'last_sync_error',
    ];

    protected function casts(): array
    {
        return [
            'endpoint_url' => 'encrypted',
            'bearer_token' => 'encrypted',
            'parameter_map' => 'array',
            'last_synced_at' => 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }

    public function waterReadings(): HasMany
    {
        return $this->hasMany(WaterReading::class);
    }
}
