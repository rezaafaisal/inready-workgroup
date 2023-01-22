<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function concentration(){
        return $this->belongsTo(Concentration::class);
    }
}
