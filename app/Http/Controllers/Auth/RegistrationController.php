<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\RegistrationRequest;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function registr(){
        return view('auth.registr');
    }

    public function store(RegistrationRequest $request){
        $data = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'nickName' => $request->nickName,
            'password' => bcrypt($request->password),
            'birthday' => $request->birthday,
        ];
        //dd($data);die;
        User::create($data);
        return redirect()->route('login');
    }
}
