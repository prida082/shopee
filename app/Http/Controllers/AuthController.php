<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $fields=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed',

        ]);

        $user=User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'password'=>bcrypt($fields['password']),

        ]);

        $token=$user->createToken('myshopee')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token,
        ];

        return response($response,201);

    }
    public function login(Request $request){

        $fields=$request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string' 
        ]);

        $user = User::where('email',$fields['email'])->first();

        if(!$user||!Hash::check($fields['password'],$user->password)){
            //error
            return response([
                'success' => false,
                'message' => 'wrong password'
            ]);
        }
        $token=$user->createToken('myshopee')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token,
        ];

        return response($response,201);
    }


    public function logout(Request $request){
        return 'logout';
    }
}
