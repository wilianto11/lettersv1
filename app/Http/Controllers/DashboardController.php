<?php

namespace App\Http\Controllers;

use Redirect;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.index', [
            "pegawai" => User::all()
        ]);
    }

    public function addpegawai(){
        return view('dashboard.addpegawai');
    }

    public function postpegawai(Request $request){
        $validatedData = $request->validate([
            "name" => "required",
            "nip" => "required|unique:users",
            "roleid" => "required",
            "jabatan" => "required"
        ]);

        $validatedData["password"] = bcrypt('bekasi2024');
        $pegawai = User::create($validatedData);
        return back()->with('success', "Pegawai baru berhasil ditambahkan");
    }

    public function deletepegawai( $id){
        $delete = DB::table('users')->where('id',$id)->delete();
        if($delete){
            return back()->with('success', "Pegawai berhasil di hapus");
        }else{
            return back()->with('error', "Pegawai Gagal di hapus");
        }
    }
}
