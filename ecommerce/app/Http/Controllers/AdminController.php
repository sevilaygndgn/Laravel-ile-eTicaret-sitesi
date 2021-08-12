<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Models\Users;

class AdminController extends Controller
{
 public function getAdmin(Request $request){
  return view('admin.admin');
}
public function postAdmin(Request $request){
  $credentials = [
    'email'    => $request->email,
    'password' => $request->password,
 ];

 $user=Sentinel::authenticate($credentials);
if ($user==TRUE) {

   return redirect()->route('yonetim.admin-panel');
}
else{
   return redirect()->back();
}

}
 public function getAdminPanel(Request $request){
  return view('admin.admin-panel');
}
}