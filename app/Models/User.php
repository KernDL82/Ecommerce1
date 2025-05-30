<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
        ];
    }

    /**
     *  =============== RELATIONSHIPS  ===============.
     */
    /**
     * The products that belong to the User.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'cart', 'user_id', 'product_id')
        ->withPivot('id', 'quantity')
        ->withTimestamps();
    }

    /**
     * Addresses.
     *
     * @return array
     */
    /**
     * Get all of the addresses for the User.
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     *  =============== SCOPES  ===============.
     */

    /**
     *  =============== FUNCTIONS  ===============.
     */
    /**
     * get groups user belongs too, associated with getGroup cretaed in product controller.
     */
    public function getGroups(): array
    {
        $group_ids = [1];

        return $group_ids;
    }

    public function scopeSubtractPoints(Builder $query, int $user_id, int $points = 0)
    {
        $query->where('id', $user_id)
        ->decrement('total_points', $points);
    }

    public function scopeAddPoints(Builder $query, int $user_id, int $points = 0)
    {
        $query->where('id', $user_id)
        ->increment('total_points', $points);
    }
}
