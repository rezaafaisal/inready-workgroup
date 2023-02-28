<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\User\Biography;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public function name():Attribute{
        return Attribute::make(
            get: fn($val) => ucwords($val),
            set: fn($val) => strtolower($val)
        );
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function lead(){
        return $this->hasOne(LeadVision::class);
    }

    public function creations(){
        return $this->hasMany(Creation::class);
    }

    public function biography(){
        return $this->hasMany(Biography::class);
    }

    public function verifyKey(){
        return $this->hasMany(VerifyKey::class);
    }
    
    protected $guarded = ['id'];

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
}
