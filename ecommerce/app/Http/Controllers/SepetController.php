<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SepetController extends Controller
{
    public function getSepet(){
        return view('sepet');
    }
}
