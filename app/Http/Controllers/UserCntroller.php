<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class UserCntroller extends Controller
{
    public function signUp(Request $req){

        $inputs = $req->validate([
            'name'=> 'required|string|max:20',
            'email'=> 'required|string|unique:users,email',
            'password'=> 'required|string|confirmed'

        ]);
        $user = User::create([
            'name'=>$inputs['name'],
            'email'=>$inputs['email'],
            'password'=> bcrypt( $inputs['password']),
        ]);

        $token = $user->createToken('userToken')->plainTextToken;

        $res = [
            'user'=>$user,
            'token'=>$token
        ];

        return response($res , 200);

    }
    //

}
