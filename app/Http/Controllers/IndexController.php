<?php

namespace App\Http\Controllers;
use App\Models\Data;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index(){


        return view('Pages.index');
    }

    public function crud(){
        $data = Data::orderBy('id', 'desc')->get();      
        return view('Pages.crud', compact('data'));
    }
    public function crudAjax(){
        
        return view('Pages.crudAjax');
    }

    public function getListData(){

        return Data::orderBy('id', 'desc')->get(); 

    }
    public function getDetailData(){

        $data = Data::findOrFail(request()->input('id'));
        return $data;

    }



}
