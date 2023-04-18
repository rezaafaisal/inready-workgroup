<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];


    public function instagram():Attribute{
        return new Attribute(
            get: fn($val) => ($val) ? 'https://instagram.com/'.$val : null,
        );
    }

    public function linkedin():Attribute{
        return new Attribute(
            get: fn($val) => ($val) ? 'https://www.linkedin.com/in/'.$val : null,
        );
    }

    public function facebook():Attribute{
        return new Attribute(
            get: fn($val) => ($val) ? 'https://facebook.com/'.$val : null,
        );
    }

    public function twitter():Attribute{
        return new Attribute(
            get: fn($val) => ($val) ? 'https://twitter.com/'.$val : null,
        );
    }


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function generation(){
        return $this->belongsTo(Generation::class);
    }

    public function major(){
        return $this->belongsTo(Major::class);
    }

    public function birthPlace(){
        return $this->belongsTo(City::class, 'birth_place', 'id');
    }

    public function currentPlace(){
        return $this->belongsTo(City::class, 'current_place', 'id');
    }
}
