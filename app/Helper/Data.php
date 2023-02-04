<?php 
     namespace App\Helper;

     class Data {
        public static function view($active, $data = null){
            return [
                'active' => $active,
                'data' => $data ? : []
            ];
        }
     }