<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DataController extends Controller
{
    public function user(){
        return DataTables::of(User::all())
            ->addIndexColumn()
            ->toJson();
    }
}
