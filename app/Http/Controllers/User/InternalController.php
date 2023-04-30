<?php

namespace App\Http\Controllers\User;

use App\Helper\Data;
use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Models\Profile;
use Illuminate\Http\Request;

class InternalController extends Controller
{
    public function history(){
        $data = Note::where('type', 'history')->first() ?? null;
        return view('user.internal.history', Data::view('history', $data));
    }

    public function leader(){
        $data = [
            'leader' => Profile::where('is_lead', true)->get()
        ];
        return view('user.internal.leader', Data::view('history', $data));
    }
}
