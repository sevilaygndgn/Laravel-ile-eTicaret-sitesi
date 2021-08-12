<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OdemeController extends Controller
{
    public function getOdeme(){
        return view('odeme');
    }
}
