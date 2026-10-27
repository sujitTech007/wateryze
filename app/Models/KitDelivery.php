<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KitDelivery extends Model
{
    protected $fillable = [
        'user_id',
        'contact_person',
        'contact_number',
        'delivery_address',
        'city',
        'province',
        'kit_type',
        'quantity',
        'delivery_date',
        'status',
        'tracking_number',
        'carrier',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'delivery_date' => 'date',
            'quantity' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
