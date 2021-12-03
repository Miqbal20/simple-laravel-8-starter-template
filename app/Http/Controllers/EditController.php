<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class EditController extends Controller
{
    //
    public function simpleEdit(Request $request){
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
        ]);

        $data = Data::find($request->id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->save();

        return redirect('/crud')->with('edit', 'Data berhasil diperbaharui');

    }

    public function updateDetailData(Request $request){

        // dd(request()->all());
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
        ]);

        $data = Data::find($request->id);
        $data->nama = $request->nama;
        $data->alamat = $request->alamat;
        $data->save();

        
    }

}
