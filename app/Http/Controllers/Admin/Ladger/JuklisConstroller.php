<?php

namespace App\Http\Controllers\Admin\Ladger;

use App\Helper\Data;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JuklisConstroller extends Controller
{
    public function index(){
        return view('admin.ledger.juklak-juknis.index', Data::view('juklis'));
    }

    public function create(){
        return view('admin.ledger.juklak-juknis.create', Data::view('juklis'));
    }

    public function store(Request $request){

    }

    public function edit($id){

    }

    public function update(Request $request, $id){

    }

    public function destroy(){

    }

    public function set($id){

    }
}
