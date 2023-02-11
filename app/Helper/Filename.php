<?php 

namespace App\Helper;

use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

     class Filename{
         public static function make($ext){
            $now = md5(Carbon::now()->format('YmdHis'));
            return $now.'.'.$ext;
         }
     }