<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function geeration(){
        return $this->belongsTo(Generation::class);
    }
}
