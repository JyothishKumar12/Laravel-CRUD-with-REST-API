<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class Usercontroller extends Controller
{
    public function register(Request $request){
        $request->validate([

            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',

        ]);

        $user = User::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        $token = $user->createToken('mytoken')->plainTextToken;
        return response([

            'user'=>$user,
            'token'=>$token

        ],201);
            
        
    }

    public function logout(){
        auth()->user()->token()->delete();
        return response([
            'message'=>'Successfully logged out!!'
        ]);
    }

    public function login(){

        $request->validate([

            'email'=>'required|email',
            'password'=>'required',

        ]);
        User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return response(['message'=>'provided credentials are incorrect'],401);
        }
        $token = $user->createToken('mytoken')->plainTextToken;
        return response([

            'user'=>$user,
            'token'=>$token

        ],200);
            
   
    }

}