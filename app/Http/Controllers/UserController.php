<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function edit($id){
        $user = User::where('id',$id)->first();
        return response()->json($user);
    }

    public function detail($id){
        $user = User::where('id',$id)->first();
        return response()->json($user);
    }

    public function update(UserEditRequest $request)
    {
        $data = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'nickName' => $request->nickName,
            'password' => bcrypt($request->password),
            'birthday' => $request->birthday,
        ]; //dd($data);die;
        $result = User::where('id', $request->id)->update($data);
        return response()->json([
            'message' => $result ? 'User updated' : 'Error',
            'status' => (bool)$result
        ]);
    }
}
