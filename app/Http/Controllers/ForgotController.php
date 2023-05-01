<?php

namespace App\Http\Controllers;

use App\Helper\Data;
use App\Models\User;
use App\Helper\Alert;
use App\Mail\VerifyEmail;
use App\Models\VerifyKey;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\ForgotPasswordVerify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;

class ForgotController extends Controller
{
    public function forgot(){
        return view('forgot.index');
    }

    public function verifyEmail(Request $request){
        $request->validate([
            'email'=> 'required|email'
        ]);

        $result = User::where('email', $request->email)->first();

        if($result){
            $email = $request->email;
            $combined = $email.'|'.Carbon::now()->format('YmdHis');
            $encrypt_key = Crypt::encryptString($combined);

            $current = VerifyKey::where([
                            'user_id' => $result->id,
                            'type' => 'forgot'
                        ])->first();
            
            if($current){
                return Alert::error('Gagal', 'Link konfirmasi telah dikirimkan di email, silahkan cek kotak masuk nya ya');
            }
            VerifyKey::create([
                'user_id' => $result->id,
                'type' => 'forgot',
                'token' => $encrypt_key
            ]);

            $link = route('new_password', ['token' => $encrypt_key]);
            Mail::to($email)->send(new ForgotPasswordVerify($link));

            return Alert::success('Berhasil Kirim Link Konfirmasi', 'Silahkan cek kotak masuk email nya ya, lalu ikuti intruksi nya untuk membuat password baru');
        }

        return Alert::error('Email tidak terdaftar', 'Jika belum memiliki akun, silahkan hubungi pihak pengurus');
    }

    public function newPassword($token){
        $result = VerifyKey::where('token', $token)->first();

        if(!$result) return abort(404);
        return view('forgot.reset', compact('token'));
    }
    
    public function setPassword(Request $request, $token){
        $request->validate([
            'password' => 'min:6|required|confirmed'
        ]);
        
        $email = explode('|', Crypt::decryptString($token))[0];

        $user = User::where('email', $email)->first();
        $user->password = Hash::make($request->password);
        $success = $user->save();

        if($success) {
            VerifyKey::where('token', $token)->delete();
            return Alert::success('Password berhasil diperbarui', 'Silahkan login  menggunakan email/username dengan password yang sesuai', 'login');
        }

        return Alert::error('Gagal', 'Terjadi kesalahan, coba ulangi beberapa saat lagi.');
        
    }
}
