<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {

        $listuser = DB::table('tbl_user')
        ->join('tbl_role', 'tbl_user.role_id', '=', 'tbl_role.role_id')
        ->select('tbl_user.*', 'tbl_role.role_name')
        ->get();

        $listrole = DB::table('tbl_role')
        ->get();


        return view('user.index', [
            'listuser' => $listuser,
            'listrole' => $listrole,
        ]);
    }

    public function tambahuser(Request $request)
    {
        $username = $request->input('nama');
        $alamat = $request->input('alamat');
        $password = $request->input('password');
        $email = $request->input('email');
        $role = $request->input('role');

        DB::table('tbl_user')->insert([
            'username' => $username,
            'email' =>  $email,
            'password' =>  $password,
            'alamat' =>  $alamat,
            'role_id' => $role,
        ]);

        return response()->json(['message' => 'User added successfully']);
    }

    public function hapususer(Request $request)
    {
        $id = $request->input('id');

        if (!$id) {
            return response()->json(['error' => 'ID pengguna tidak valid.'], 400);
        }

        // Hapus pengguna dari tabel
        DB::table('tbl_user')
            ->where('id', $id)
            ->delete();

        // Berikan respons sukses
        return response()->json(['message' => 'Pengguna berhasil dihapus.'], 200);
    }

}
