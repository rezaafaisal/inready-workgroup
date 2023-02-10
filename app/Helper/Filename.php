<?php 

namespace App\Helper;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

     class Filename{
         public static function hash($name, $ext){
            $now = Hash::make(Carbon::now()->format('YmdHis'));
            return $name.'_'.$now.'.'.$ext;
         }
     }