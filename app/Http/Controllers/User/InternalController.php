<?php

namespace App\Http\Controllers\User;

use App\Helper\Data;
use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class InternalController extends Controller
{
    public function history(){
        $data = Note::where('type', 'history')->first() ?? null;
        return view('user.internal.history', Data::view('sejarah', $data));
    }

    public function leader(){
        return view('user.internal.leader');
    }
}
