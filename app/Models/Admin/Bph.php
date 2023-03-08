<?php

namespace App\Models\Admin;

use App\Models\Period;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bph extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function period(){
        return $this->belongsTo(Period::class);
    }
}
