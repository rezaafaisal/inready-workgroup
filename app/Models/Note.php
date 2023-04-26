<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function body():Attribute{
        return new Attribute(
            set:fn($value) => strtolower($value),
            // get: fn($value) => htmlspecialchars($value)
        );
    }
}
