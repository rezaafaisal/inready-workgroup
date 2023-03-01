<?php

namespace App\Http\Controllers\User;

use App\Helper\Data;
use App\Models\City;
use App\Models\User;
use App\Helper\Alert;
use App\Models\Major;
use App\Models\Profile;
use App\Helper\Filename;
use Illuminate\Http\Request;
use App\Models\User\Biography;
use App\Http\Controllers\Controller;
use App\Models\VerifyKey;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeUnit\FunctionUnit;

class ProfileController extends Controller
{
    
    public function index(){
        $data = Auth::user();
        return view('user.profile.index', Data::view('profile', $data));
    }

    public function profile(){
        $data = [
            'majors' => Major::all(),
            'user' => User::find(Auth::id(), ['username', 'name', 'email']),
            'profile' => Profile::where('user_id', Auth::id())->first(['major_id', 'address', 'image', 'headline', 'biography'])
        ];
        return view('user.profile.profile', Data::view('profile', $data));
    }

    public function personal(){
        $data = [
            'cities' => City::all(),
            'profile' => Profile::where('user_id', Auth::id())->first()
        ];
        return view('user.profile.personal', Data::view('personal', $data));
    }
    
    public function account(){
        $data = [
            'sending' => VerifyKey::where('user_id', Auth::id())->where('type', 'verify')->first()
        ];
        return view('user.profile.account', Data::view('account', $data));
    }

    public function etcetera(){
        $data = [
            'organization' => Biography::where('user_id', Auth::id())->where('type', 'organization')->get(),
            'sd' => Biography::where(['user_id' => Auth::id(), 'type' => 'sd'])->first(),
            'sltp' => Biography::where(['user_id' => Auth::id(), 'type' => 'sltp'])->first(),
            'slta' => Biography::where(['user_id' => Auth::id(), 'type' => 'slta'])->first(),
            'social' => Profile::where('user_id', Auth::id())->first(['instagram', 'twitter', 'facebook', 'linkedin'])
        ];
        return view('user.profile.etcetera', Data::view('etcetera', $data));
    }

    public function education(Request $request){
       $request->validate([
            'sd' => 'required',
            'sltp' => 'required',
            'slta' => 'required'
        ]);

        $filtered = $request->collect()->except('_token')->toArray();

        $types = ['sd', 'sltp', 'slta'];

        foreach ($types as $type) {
            $success = Biography::updateOrCreate(
                ['user_id' => Auth::id(), 'type' => $type],
                ['name' => $filtered[$type] ?? null, 'period' => $filtered[$type.'_period'] ?? null]
            );
        }

        if($success){
            return Alert::success('Berhasil Diupdate', 'Data Pendidikan Berhasil Diupdate');
        }

        return Alert::error('Gagal', 'Gagal Memperbarui');  
    }

    public function organization(Request $request){
        $avalaible_key = [];
        for ($i=1; $i <= 10 ; $i++) { 
            array_push($avalaible_key, 'organization_'.$i);
        }

        $filtered = $request->collect()->filter(function($value){
            return $value !== null;
        })->except('_token')->toArray();

        foreach ($filtered as $key => $value) {
           if(in_array($key, $avalaible_key)){
                (isset($filtered[$key.'_id'])) ? $biography = Biography::find($filtered[$key.'_id']) : $biography = new Biography();
                $biography->user_id = Auth::id();
                $biography->name = $value;
                $biography->type = 'organization';
                $biography->period = $filtered[$key.'_year'] ?? null;
                $success = $biography->save();
            }
        }

        $success = $success ?? false;
        if($success){
            return Alert::success('Berhasil Diupdate', 'Data Organisasi Berhasil Diupdate');
        }

        return Alert::error('Gagal', 'Gagal Memperbarui');    
    }

    public function social(Request $request){
        $success = Profile::where('user_id', Auth::id())->update([
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
        ]);

        if($success){
            return Alert::success('Berhasil Update', 'Data Sosial Media Berhasil Diperbarui');
        }

        return Alert::error('Gagal', 'Terjadi Kesalahan');
    }

    public function setPersonal(Request $request){
        $request->validate([
            'whatsapp' => 'required|numeric|digits_between:7,12',
            'current_place' => 'required',
            'address' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required',
            'gender' => 'required',
        ]);

        $profile = Profile::where('user_id', Auth::id())->first();
        $profile->whatsapp = $request->whatsapp;
        $profile->current_place = $request->current_place;
        $profile->address = $request->address;
        $profile->birth_place = $request->birth_place;
        $profile->birth_date = $request->birth_date;
        $profile->gender_id = $request->gender;
        $profile->job = $request->job;
        $profile->instance = $request->instance;
        $success = $profile->save();

        if($success){
            return Alert::success('Berhasil Update', 'Data Pribadi Telah Diperbarui');
        }

        return Alert::error('Gagal Mengupdate', 'Gagal Menyimpan Perubahan');
    }

    public function setProfile(Request $request){
        Validator::extend('without_spaces', function($attr, $value){
            return preg_match('~^(?!\.)[\w.]*$(?<!\.)~', $value);
        });
        $request->validate([
            'fullname' => 'required',
            'username' => 'required|without_spaces|unique:users,username,'.Auth::id(),
            'major' => 'required'
        ],
        [
            'username.without_spaces' => 'Username hanya boleh menggunakan karakter a-z 0-9 - _ dan .',
            'username.unique' => 'Username tidak tersedia, silahkan pilih yang lain'
        ]);

        $user = User::find(Auth::id());
        $user->username = $request->username;
        $user->name = $request->fullname;
        $user->save();

        $profile = Profile::where('user_id', Auth::id())->first();
        // cek apakah mengupload gambar
        if($request->image_result){
            // cek apakah sudah ada gambar, kalaua ada hapus gambar lama
            if($profile->image != null){
                Storage::delete('profiles/'.$profile->image);
            }
            $filter = explode(',', $request->image_result) ;
            $bin = base64_decode($filter[1]);
            
            $image = imagecreatefromstring($bin);
    
            // save image to storage
            $filename = Filename::make('png');
            $img_file = storage_path('app/profiles/'.$filename);
            imagepng($image, $img_file, 0);
            $profile->image = $filename;
        }
        $profile->headline = $request->headline;
        $profile->biography = $request->biography;
        $profile->major_id = $request->major;
        $success = $profile->save();
        if($success){
            return Alert::default(true, 'Diperbarui');
        }

        return Alert::default(false, 'Diperbarui');
    }

    public function verifyEmail($key){
        $match_token = VerifyKey::where('token', $key)->first();

        if(!$match_token) return view('emails.fail');

        $combined = Crypt::decryptString($key);
        $email = explode('|', $combined)[0];
        $username = explode('|', $combined)[1];

        $success = User::where('username', $username)->update([
            'email' => $email
        ]);
        
        // delete token
        $match_token->delete();

        if($success){
            return view('emails.success', ['email' => $email, 'username' => $username]);
        }
        
    }

    public function cancelVerifyEmail(){
        VerifyKey::where([
            'user_id' => Auth::id(),
            'type' => 'verify'
        ])->delete();

        return redirect()->back();
    }

    public function setPassword(Request $request){
        $request->validate([
            'password' => 'required|min:5|confirmed'
        ]);
    
        $success = User::find(Auth::id())->update([
            'password' => Hash::make($request->password)
        ]);

        if($success){
            return Alert::success('Berhasil', 'Kata Sandi berhasil diubah');
        }

        return Alert::error('Gagal', 'Gagal mengubah kata sandi');
    }
}
