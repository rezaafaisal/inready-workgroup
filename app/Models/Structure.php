<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    public function Division():Attribute{
        return new Attribute(
            get: fn($val) => ucwords($val),
            set: fn($val) => strtolower($val),
        );
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function period(){
        return $this->belongsTo(Period::class);
    }
}
