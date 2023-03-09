<?php

namespace App\Models;

use App\Models\Admin\Bph;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $guarded = ['id'];

    public function structure(){
        return $this->hasOne(Structure::class);
    }
}
