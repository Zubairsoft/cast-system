<?php

namespace App\Models;

use Domains\Global\Traits\RegisterEventActivityLog;
use Domains\User\Enums\Role;
use Domains\User\Enums\Subscription\Type;
use Domains\User\Presenter\UserPresenter;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Domains\User\Trait\Account\AccountVerification;
use Domains\User\Trait\Account\HasRole;
use Domains\User\Trait\Account\ManageSubscription;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, AccountVerification, HasRole, UserPresenter,ManageSubscription, RegisterEventActivityLog;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'avatar',
        'role',
        'password',
        'status'
    ];

    /**p
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => 'string'
    ];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class, 'creator_id');
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class, 'representative_id');
    }

    public function likeCreator(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function favoritesMusic(): HasManyThrough
    {
        return $this->hasManyThrough(
            Music::class,
            favorite::class,
            'user_id',
            'id',
            'id',
            'favoriteable_id'
        )->where('favoriteable_type', Music::class);
    }

    public function favorites(): HasMany
    {
        return $this->hasMany(favorite::class, 'user_id');
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class, 'subscription_id');
    }

    ################# scope #########################

    public function scopeIsAdmin(Builder $query): Builder
    {
        return   $query->where('role', Role::ADMIN);
    }
}
