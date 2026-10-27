<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerLab extends Model
{
    protected $fillable = [
        'lab_name',
        'lab_type',
        'registration_number',
        'website',
        'email',
        'contact_person',
        'phone',
        'contact_email',
        'position',
        'address',
        'city',
        'province',
        'postal_code',
        'country',
        'status',
        'services',
        'notes',
    ];

    protected function casts(): array
    {
        return ['services' => 'array'];
    }
}
