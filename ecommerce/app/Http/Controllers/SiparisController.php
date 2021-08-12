<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiparisController extends Controller
{
    public function getSiparisler(){
        return view('siparisler');
    }
    public function detay($id){
        return view('siparis');
    }

}
