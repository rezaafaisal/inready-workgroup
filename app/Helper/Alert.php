<?php 
     namespace App\Helper;

     class Alert {
        public static function default($success, $action, $route = null){
            if($success){
                session()->put('alert', ['icon' => 'success', 'title' => 'Berhasil', 'text' => 'Data Berhasil '.$action]);
            }

            else{
                session()->put('alert', ['icon' => 'error', 'title' => 'Gagal', 'text' => 'Data Gagal '.$action]);
            }

            if($route != null){
                return redirect()->route($route);
            }
            return redirect()->back();
         }
     }