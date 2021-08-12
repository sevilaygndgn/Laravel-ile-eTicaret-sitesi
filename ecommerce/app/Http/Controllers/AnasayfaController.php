<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class AnasayfaController extends Controller
{
    public function getAnasayfa(){
        $kategoriler = Kategori::whereNull('ust_id')->get()->take(8);
        return view('anasayfa', compact('kategoriler'));
    }
}
