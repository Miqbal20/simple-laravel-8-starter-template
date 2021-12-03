<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class TambahController extends Controller
{
    //
    public function simpleTambah(Request $request){

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
        ]);
        
        $data = new Data;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->save();

        return redirect('/crud')->with('tambah', 'Data berhasil ditambah');

    }

    public function ajaxTambah(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
        ]);
        
        $data = new Data;
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->save();

    }
}
