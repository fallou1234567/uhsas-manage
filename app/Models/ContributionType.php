<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContributionType extends Model
{
    protected $fillable = [
        'name',
        'amount',
        'year',
        'is_active',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'year' => 'integer',
        'is_active' => 'boolean',
    ];

    public function contributions(): HasMany
    {
        return $this->hasMany(Contribution::class);
    }
}