<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technician extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'date_of_birth',
        'employee_id',
        'address',
        'city',
        'province',
        'postal_code',
        'country',
        'service_area',
        'job_title',
        'years_experience',
        'availability',
        'employment_status',
        'certification_status',
        'hire_date',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'hire_date' => 'date',
            'years_experience' => 'integer',
        ];
    }
}
