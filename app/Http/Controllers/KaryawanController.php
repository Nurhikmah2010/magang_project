<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class KaryawanController extends Controller
{
    public function index()
    {
        $listKaryawan = DB::table('tbl_karyawan')
        ->join('tbl_user', 'tbl_karyawan.id_user', '=', 'tbl_user.id')
        ->select('tbl_karyawan.*', 'tbl_user.username')
        ->get();

        $listUsers = DB::table('tbl_user')
            ->select('*')
            ->get();

        return view('karyawan.indexkaryawan', [
            'listUsers' => $listUsers,
            'listKaryawan' => $listKaryawan,
        ]);
    }


    public function tambahkaryawan(Request $request)
    {

        DB::table('tbl_karyawan')->insert([
            'nama' => $request->input('namaKaryawan'),
            'jabatan' => $request->input('jabatan'),
            'departemen' => $request->input('departemen'),
            'id_user' => $request->input('usernya'),
        ]);

        return response()->json(['message' => 'Karyawan added successfully']);
    }



}
