<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Member extends Model
{
    protected $fillable = [
        'member_number',
        'first_name',
        'last_name',
        'phone',
        'email',
        'birth_date',
        'gender',
        'photo',
        'profession_id',
        'region_id',
        'department_id',
        'commune_id',
        'address',
        'registration_source',
        'status',
        'registered_at',
        'activated_at',
        'membership_expires_at',
        'notes',
    ];

    protected $casts = [
        'birth_date' => 'date',
        'registered_at' => 'datetime',
        'activated_at' => 'date',
        'membership_expires_at' => 'date',
    ];

    public function profession(): BelongsTo
    {
        return $this->belongsTo(Profession::class);
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }

    public function card(): HasOne
    {
        return $this->hasOne(MembershipCard::class);
    }

    public function contributions(): HasMany
    {
        return $this->hasMany(Contribution::class);
    }

    public function statusHistories(): HasMany
    {
        return $this->hasMany(MemberStatusHistory::class);
    }

    public function getFullNameAttribute(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }
}