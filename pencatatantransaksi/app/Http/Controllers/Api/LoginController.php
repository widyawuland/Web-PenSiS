<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SiswaResource;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function Login(Request $request){
        //validasi request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //panggil model user
        $user = User::where("email", $request->email)->first();
        if (!$user || $request->password !== $user->password) {
            return new SiswaResource(false, "Password salah", 401);
        }

        //variabel token untuk mengindentifikasi kita untuk login
        $token=$user->createToken("auth_token",$user->getAllPermissions()->pluck("name")->toArray())->plainTextToken;
        return new SiswaResource(true, "Berhasil",[
            "token" => $token,
            //menampilkan hak akses pengguna yang sudah login
            "hak"=>$user->load("roles")
        ]);
    }

    public function LoginOut(Request $request){
        $request->user()->currentAccessToken()->delete();
        return new SiswaResource(true, "Berhasil Logout",202);
    }
}
