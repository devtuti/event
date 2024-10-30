<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function login_post(LoginRequest $request){
        if (auth()->attempt($request->only('nickName', 'password'), (bool)($request->remember_me == "on"))) {
            return redirect()->route('index');
        } else {
            return back();
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
    
}
