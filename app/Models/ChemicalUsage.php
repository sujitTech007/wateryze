<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChemicalUsage extends Model
{
    protected $fillable = [
        'site_id', 'chemical_name', 'usage_date', 'quantity', 'unit', 'purpose', 'notes',
    ];

    protected function casts(): array
    {
        return [
            'usage_date' => 'date',
            'quantity' => 'decimal:3',
        ];
    }

    public function site(): BelongsTo
    {
        return $this->belongsTo(Site::class);
    }
}
