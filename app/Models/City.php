<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function birthPlaces(){
        return $this->hasMany(Profile::class, 'birth_place', 'id');
    }

    public function currentPlaces(){
        return $this->hasMany(Profie::class, 'current_place', 'id');
    }
}
