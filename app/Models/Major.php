<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Major extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function name():Attribute{
        return Attribute::make(
            get:fn($val) => ucwords($val),
            set:fn($val) => strtolower($val)
        );
    }
    
    public function profiles(){
        return $this->hasMany(Profile::class);
    }
}
