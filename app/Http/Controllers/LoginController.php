<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function index()
    {

        // $listuser = DB::table('tbl_user')->get();


        return view('login.index');
    }

    public function cekuser (Request $request)

    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::table('user')
            ->where('email', $email)
            ->where('password', $password)
            ->first();

        if ($user) {
            return response()->json(['message' => 'Pengguna ditemukan.']);
        } else {
            return response()->json(['message' => 'Email atau password salah.'], 401);
        }
    }

    public function logout ()
    {
         return redirect('/')->with('succes', 'Berhasil Logout');
    }
}
