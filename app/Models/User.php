<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
    ];
    protected $guarded = [''];

    public function get_products(){
        return $this->hasMany(product::class,'user_id', 'id');
    }
    public function order(){
        return $this->hasMany(order::class,'user_id', 'id');
    }
    public function address(){
        return $this->hasMany(address::class,'user_id', 'id');
    }
    public function payments(){
        return $this->hasMany(payment::class,'user_id', 'id');
    }
}
