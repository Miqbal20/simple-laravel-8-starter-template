<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class HapusController extends Controller
{
    //
    
    public function simpleHapus(Request $request){
        $data = Data::find($request->id);
        $data->delete();

        return redirect('/crud')->with('hapus', 'Data berhasil dihapus');
    }
    public function ajaxHapus(Request $request){
        $data = Data::find($request->id);
        $data->delete();

    }
}
