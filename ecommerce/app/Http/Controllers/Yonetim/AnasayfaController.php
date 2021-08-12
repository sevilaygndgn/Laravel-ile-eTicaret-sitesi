<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Sentinel;

class AnasayfaController extends Controller
{     


   public function index(Request $request)
   {

        return view('yonetim.anasayfa');
    }
}
