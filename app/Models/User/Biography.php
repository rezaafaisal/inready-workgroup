<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biography extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function

    public function user(){
        return $this->belongsTo(User::class);
    }
}
