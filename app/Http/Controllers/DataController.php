<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Document;
use Illuminate\Support\Str;

// route and view controller
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Admin\Ledger\DocumentController;

class DataController extends Controller
{
    private $type;
    public function user(){
        return DataTables::of(User::all())
            ->addIndexColumn()
            ->addColumn('generation', function($row){
                return $row->profile->generation?->name;
            })
            ->addColumn('whatsapp', function($row){
                if(!$row->profile->whatsapp!= null){
                    return '<span class="label label-light-danger label-inline">Belum diisi</span>';
                }
                return $row->profile->whatsapp;
            })
            ->addColumn('action', function($row){
                $id = $row->id;
                $edit = route('admin.pengguna.edit', ['pengguna' => $id]);
                $detail = route('admin.pengguna.show', ['pengguna' => $id]);
                $reset = route('admin.pengguna.reset', ['id' => $id]);
                $data = json_encode($row->only(['id', 'name']));
                $button = "
                    <div class='d-flex flex-nowrap gap-3'>
                        <a href='$detail'
                            class='btn btn-sm btn-clean btn-outline-info btn-icon' data-toggle='tooltip' data-placement='top' title='Detail'>
                            <i class='las la-info'></i>
                        </a>
                        <a href='$reset' class='btn btn-sm btn-clean btn-outline-warning btn-icon' data-toggle='tooltip' data-placement='top' title='Reset Password'>
                            <i class='la la-key'></i>
                        </a>
                        <a href='$edit'
                            class='btn btn-sm btn-clean btn-outline-success btn-icon' data-toggle='tooltip' data-placement='top' title='Edit'>
                            <i class='la la-edit'></i>
                        </a>
                        <button onclick='delete_data($data)'
                            class='btn btn-sm btn-clean btn-outline-danger btn-icon' data-toggle='tooltip' data-placement='top' title='Hapus'>
                            <i class='la la-trash'></i>
                        </button>
                    </div>
                ";
                return $button;
            })
            ->rawColumns(['action', 'whatsapp'])
            ->escapeColumns()
            ->toJson();
    }

    public function note(){
        return DataTables::of(Note::all())
            ->addIndexColumn()
            ->editColumn('body', function($row){
                return Str::limit($row->body, 100);
            })
            ->addColumn('action', function($row){
                $id = $row->id;
                $edit = route('admin.pengguna.edit', ['pengguna' => $id]);
                $detail = route('admin.pengguna.show', ['pengguna' => $id]);
                $reset = route('admin.pengguna.reset', ['id' => $id]);
                $data = json_encode($row->only(['id', 'type', 'body']));
                $button = "
                    <div class='d-flex flex-nowrap gap-3'>
                        <button class='btn btn-sm btn-clean btn-outline-success btn-icon' onclick='setNote($row)' data-toggle='modal' data-target='#edit_note' data-toggle='tooltip' data-placement='top' title='Edit'>
                            <i class='la la-edit'></i>
                        </button>
                        <button onclick='deleteNote($id)'
                            class='btn btn-sm btn-clean btn-outline-danger btn-icon' data-toggle='tooltip' data-placement='top' title='Hapus'>
                            <i class='la la-trash'></i>
                        </button>
                    </div>
                ";
                return $button;
            })
            ->rawColumns(['action', 'body'])
            ->escapeColumns(['body'])
            ->toJson();
    }

    public function document($type){
        $this->type = $type;
        return DataTables::of(Document::where('type', $type)->orderBy('period_id', 'desc')->get())
            ->addIndexColumn()
            ->editColumn('file', function($row){
                $ext = '.'.last(explode('.', $row->file));
                $filename = Str::limit($row->file, 20, $ext);
                return $filename;
            })
            ->editColumn('status', function($row){
                if(!$row->status){
                    return '<span class="label label-light-danger label-inline">Tidak Berlaku</span>';
                }
                return '<span class="label label-light-primary label-inline">Sedang Berlaku</span>';
            })
            ->addColumn('action', function($row){
                $id = $row->id;
                $edit = route(DocumentController::route('edit'), ['type' => $this->type, 'id' => $id]);
                $show = asset('documents/'.$this->type.'/'.$row->file);
                $data = json_encode($row->only(['id', 'name']));
                $button = "
                    <div class='d-flex flex-nowrap gap-3'>
                        <a href='$show'
                            class='btn btn-sm btn-clean btn-outline-info btn-icon' target='_blank' data-toggle='tooltip' data-placement='top' title='Detail'>
                            <i class='las la-eye'></i>
                        </a>
                        <a href='$edit'
                            class='btn btn-sm btn-clean btn-outline-success btn-icon' data-toggle='tooltip' data-placement='top' title='Edit'>
                            <i class='la la-edit'></i>
                        </a>
                        <button onclick='delete_data($data)'
                            class='btn btn-sm btn-clean btn-outline-danger btn-icon' data-toggle='tooltip' data-placement='top' title='Hapus'>
                            <i class='la la-trash'></i>
                        </button>
                    </div>
                ";
                return $button;
            })
            ->removeColumn('period_id')
            ->addColumn('period', function($row){
                return $row->period?->period;
            })
            ->rawColumns(['action', 'status'])
            ->escapeColumns()
            ->toJson();
    }
}
