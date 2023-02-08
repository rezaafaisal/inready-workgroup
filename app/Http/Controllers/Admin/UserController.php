<?php

namespace App\Http\Controllers\Admin;

use App\Helper\Data;
use App\Models\User;
use App\Helper\Alert;
use App\Models\Major;
use App\Models\Profile;
use App\Models\Generation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'generation' => Generation::all()
        ];
        return view('admin.user.index', Data::view('user', $data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'generation' => Generation::all(),
            'major' => Major::all()
        ];
        return view('admin.user.create', Data::view('user', $data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|min:3',
            'username' => 'required|min:3|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = new User();
        $user->role_id = 2;
        $user->name = $request->fullname;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $success = $user->save();

        if($success){
            Profile::create([
                'user_id' => $user->id,
                'generation_id' => $request->generation,
                'major_id' => $request->major,
                'is_lead' => $request->lead ? true : false
            ]);

            return Alert::default($success, 'Ditambah', 'admin.pengguna.index');
        }

        return Alert::default(false, 'Ditambah', 'admin.pengguna.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [
            'generation' => Generation::all(),
            'major' => Major::all(),
            'user' => User::with('profile')->find($id)
        ];
        return view('admin.user.edit', Data::view('pengguna', $data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        $user = User::find($id);

        $request->validate([
            'fullname' => 'required|min:3',
            'username' => 'required|min:3|unique:users,username,'.$user->id,
            'email' => 'nullable|email|unique:users,email,'.$user->id
        ]);

        $success = $user->update([
            'name' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email
        ]);

        if($success){
            Profile::where('user_id', $user->id)->first()->update([
                'generation_id' => $request->generation,
                'major_id' => $request->major,
                'is_lead' => $request->lead ? true : false,
                'whatsapp' => $request->whatsapp,
                'address' => $request->address,
            ]);

            return Alert::default(true, 'Diperbaharui', 'admin.pengguna.index');
        }

        return Alert::default(false, 'Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
