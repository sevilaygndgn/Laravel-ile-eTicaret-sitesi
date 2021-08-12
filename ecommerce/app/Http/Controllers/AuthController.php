<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
class AuthController extends Controller
{
    public function getLogin(Request $request)
    {
        return view('auth.login');
    }
    public function postLogin(Request $request){

                $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        $giris = Sentinel::authenticate($credentials);
        if($giris == TRUE)
        {
            return redirect()->route('site.getIndex');
        }
        else
        {
            return redirect()->back();
        }

    }

    public function getRegister(Request $request)
     {
        return view('auth.register');
    }
    public function postRegister(Request $request)
    {

        $validated = $request->validate([
        'email' => 'required|unique:users,email|max:255',
        'password' => 'required',
    ]);

        $credentials = [
    'email'    => $request->email,
    'password' => $request->password,
];

    $user = Sentinel::register($credentials);
    return redirect()->route('site.getLogin');
    }
    public function getLogout(Request $request)
    {
        Sentinel::logout();

        return redirect()->route('site.getLogin');
    }
}
