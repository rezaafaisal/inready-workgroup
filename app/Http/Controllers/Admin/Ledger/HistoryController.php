<?php

namespace App\Http\Controllers\Admin\Ledger;

use App\Helper\Alert;
use App\Helper\Data;
use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $data = Note::where('type', 'history')->first() ?? null;
        return view('admin.ledger.history', Data::view('history', $data));
    }

    public function update(Request $request){
        $success = Note::updateOrCreate(
            ['type' => 'history'],
            ['body' => $request->history],
        );

        if($success){
            return Alert::default(true, 'Diperbaharui', 'admin.ledger.history.index');
        }
        return Alert::default(false, 'Diperbaharui');
    }
}
