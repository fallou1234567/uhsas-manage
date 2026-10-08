<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Member extends Model
{
    use HasFactory;

    /**
     * Champs pouvant être remplis en masse.
     */
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

    /**
     * Conversion automatique des attributs.
     */
    protected $casts = [
        'birth_date'            => 'date',
        'registered_at'         => 'datetime',
        'activated_at'          => 'datetime',
        'membership_expires_at' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Profession du membre.
     */
    public function profession(): BelongsTo
    {
        return $this->belongsTo(Profession::class);
    }

    /**
     * Région du membre.
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * Département du membre.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Commune du membre.
     */
    public function commune(): BelongsTo
    {
        return $this->belongsTo(Commune::class);
    }

    /**
     * Carte d'adhérent.
     */
    public function card(): HasOne
    {
        return $this->hasOne(MembershipCard::class);
    }

    /**
     * Cotisations du membre.
     */
    public function contributions(): HasMany
    {
        return $this->hasMany(Contribution::class);
    }

    /**
     * Historique des changements de statut.
     */
    public function statusHistories(): HasMany
    {
        return $this->hasMany(MemberStatusHistory::class);
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /**
     * Nom complet du membre.
     *
     * Exemple :
     * first_name = "Fadhilou"
     * last_name  = "Badiane"
     *
     * Résultat :
     * "Fadhilou Badiane"
     */
    public function getFullNameAttribute(): string
    {
        return trim(
            $this->first_name . ' ' . $this->last_name
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STATUS HELPERS
    |--------------------------------------------------------------------------
    */

    /**
     * Vérifie si le membre est actif.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Vérifie si le membre est en attente.
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Vérifie si le membre est désactivé.
     */
    public function isDisabled(): bool
    {
        return $this->status === 'disabled';
    }

    /**
     * Vérifie si l'adhésion est arrivée à expiration.
     */
    public function isMembershipExpired(): bool
    {
        if (!$this->membership_expires_at) {
            return false;
        }

        return $this->membership_expires_at->isPast();
    }

    /**
     * Vérifie si l'adhésion est actuellement valide.
     */
    public function hasValidMembership(): bool
    {
        if (!$this->isActive()) {
            return false;
        }

        if (!$this->membership_expires_at) {
            return true;
        }

        return !$this->membership_expires_at->isPast();
    }

    /**
     * Retourne le nombre de jours avant expiration.
     */
    public function getDaysUntilExpirationAttribute(): ?int
    {
        if (!$this->membership_expires_at) {
            return null;
        }

        return now()->startOfDay()
            ->diffInDays(
                $this->membership_expires_at->startOfDay(),
                false
            );
    }

    /**
     * Vérifie si l'adhésion expire prochainement.
     *
     * Par défaut : dans les 30 prochains jours.
     */
    public function membershipExpiresSoon(int $days = 30): bool
    {
        if (!$this->membership_expires_at) {
            return false;
        }

        if ($this->isMembershipExpired()) {
            return false;
        }

        return now()->startOfDay()
            ->diffInDays(
                $this->membership_expires_at->startOfDay(),
                false
            ) <= $days;
    }

    /*
    |--------------------------------------------------------------------------
    | DISPLAY HELPERS
    |--------------------------------------------------------------------------
    */

    /**
     * Retourne le libellé du statut.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'active'   => 'Actif',
            'pending'  => 'En attente',
            'disabled' => 'Désactivé',
            default    => ucfirst($this->status ?? 'Inconnu'),
        };
    }

    /**
     * Retourne la classe CSS correspondant au statut.
     */
    public function getStatusClassAttribute(): string
    {
        return match ($this->status) {
            'active'   => 'active',
            'pending'  => 'pending',
            'disabled' => 'disabled',
            default    => 'unknown',
        };
    }

    /**
     * Retourne le libellé du genre.
     */
    public function getGenderLabelAttribute(): string
    {
        return match ($this->gender) {
            'male'   => 'Homme',
            'female' => 'Femme',
            default  => 'Non renseigné',
        };
    }

    /**
     * Retourne le libellé de la source d'inscription.
     */
    public function getRegistrationSourceLabelAttribute(): string
    {
        return match ($this->registration_source) {
            'web'   => 'Plateforme web',
            'admin' => 'Administration',
            'mobile' => 'Application mobile',
            default => ucfirst($this->registration_source ?? 'Inconnue'),
        };
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * Membres actifs.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Membres en attente.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Membres désactivés.
     */
    public function scopeDisabled($query)
    {
        return $query->where('status', 'disabled');
    }

    /**
     * Membres dont l'adhésion est expirée.
     */
    public function scopeExpired($query)
    {
        return $query
            ->whereNotNull('membership_expires_at')
            ->whereDate(
                'membership_expires_at',
                '<',
                now()->toDateString()
            );
    }

    /**
     * Membres dont l'adhésion est encore valide.
     */
    public function scopeValidMembership($query)
    {
        return $query
            ->active()
            ->where(function ($query) {
                $query
                    ->whereNull('membership_expires_at')
                    ->orWhereDate(
                        'membership_expires_at',
                        '>=',
                        now()->toDateString()
                    );
            });
    }

    /**
     * Recherche par nom, téléphone ou numéro de membre.
     */
    public function scopeSearch($query, ?string $search)
    {
        if (!$search) {
            return $query;
        }

        return $query->where(function ($query) use ($search) {

            $query
                ->where('first_name', 'like', "%{$search}%")
                ->orWhere('last_name', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%")
                ->orWhere('member_number', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");

        });
    }
}