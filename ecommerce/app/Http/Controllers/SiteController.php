<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class SiteController extends Controller
{
      public function getIndex(Request $request)
    {  
        $kategoriler = Kategori::whereNull('ust_id')->get();
        return view('Anasayfa',compact('kategoriler'));
    }
}
