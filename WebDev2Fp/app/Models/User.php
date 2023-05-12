<?php

namespace App\Models;

 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'provider',
        'provider_id',
        'email',
        'password',
        'Gender',
        'Age',
        'phone_number'
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
    ];

    public function getRole(){
        return $this->belongsToMany(role::class,'userroles','user_id','role_id');
    }

    public function hasRole($roleName)
    {
        return $this->getRole()->where('name', $roleName)->exists();
    }

    public function getBasket()
    {
        return $this->hasOne(basket::class);
    }
    public function getReviews(){
        return $this->hasMany(review::class);
    }

    public function getOrders(){
        return $this->hasMany(order::class);
    }

    public function getStore(){
        return $this->hasOne(store::class);
    }
}
