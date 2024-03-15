<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject{

    use HasApiTokens, HasFactory, Notifiable;

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    /**
     * Get all of the boards for the User
     *
     * @return HasMany
     */
    public function boards()
    : HasMany{
        return $this->hasMany(Board::class);
    }

    /**
     * Get all of the cards for the User
     *
     * @return HasMany
     */
    public function cards()
    : HasMany{
        return $this->hasMany(Card::class);
    }

    /**
     * Get all of the card assigned to the User
     *
     * @return HasMany
     */
    public function assignedCards()
    : HasMany{
        return $this->hasMany(Card::class, 'assigned_to');
    }

    /**
     * Get all of the card created by the User
     *
     * @return HasMany
     */
    public function createdCards()
    : HasMany{
        return $this->hasMany(Card::class, 'created_by');
    }

    /**
     * Get all of the columns created by the User
     *
     * @return HasMany
     */
    public function createdColumns()
    : HasMany{
        return $this->hasMany(Column::class, 'created_by');
    }

    /**
     * Get all of the card followed by the User
     *
     * @return BelongsToMany
     */
    public function followingCards()
    : BelongsToMany{
        return $this->belongsToMany(Card::class, 'card_followers', 'user_id', 'card_id');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier(){
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims(){
        return [];
    }
}
