<?php

namespace App\Models;

use App\Models\Admin\Bph;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Period extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = ['id'];

    public function structure(){
        return $this->hasMany(Structure::class);
    }

    public function division(){
        return $this->hasMany(Division::class);
    }
}
