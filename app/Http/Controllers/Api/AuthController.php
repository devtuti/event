<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function post(){
        $res =  request()->all();
        return response()->json([
            'message' => "Login succsess",
            'data' => $res,
            //'status' => 404
        ]);
    }
}
