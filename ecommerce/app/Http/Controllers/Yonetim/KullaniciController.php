<?php

namespace App\Http\Controllers\Yonetim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Sentinel;
class KullaniciController extends Controller
{


   public function getoturumac(Request $request){
     return view('yonetim.oturumac');
   }
   public function postoturumac(Request $request){
        $credentials=[
            'email'=> $request->email,
            'password'=>$request->password,
        ];

        $ekran=Sentinel::authenticateAndRemember($credentials);
        if($ekran==TRUE){

            return redirect()->route('yonetim.anasayfa');
        }
        
        else{
dd($ekran);
            
            return redirect()->error();
        }
}
}


   /* public function oturumac(){

      if(request()->isMethod('POST'))
      {
          $this->validate(request(), [
            'email' =>'required|email',
            'password' => 'required'
          ]);

          $credentials =[
            'email' => request()->get('email'),
            'password' => request()->get('password'),
            'yonetici_mi' => 1
          ];
          if (auth()->attemp($credentials))
          {
            return redirect()->route('yonetim.anasayfa');
          }
          else {
            return back()->withInput()->withErrors(['email' => 'Giriş hatalı!']);
          }
      }
    return view('yonetim.oturumac');
   }

   public function index(){
    $list = User::orderByDesc('created_at')->paginate(8);
    return view('yonetim.layouts.kullanici.index', compact('list'));
   }*/