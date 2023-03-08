<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = ['id'];

    public function programs(){
        return $this->hasMany(Program::class);
    }

    public function profiles(){
        return $this->hasMany(Profile::class);
    }

    public function structures(){
        return $this->hasMany(Structure::class);
    }

    public function documents(){
        return $this->hasMany(Document::class);
    }
    
}
