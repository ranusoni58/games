<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class UserController extends Controller
{
    function registration(Request $request){
        $validation=Validator::make($request->all(),[
           'name'=>'required|max:8',
           'email'=>'required|email',
           'password'=>'required|max:8',
           'c_password'=>'required|same:password',
           
        ]);
       
        if($validation->fails()){
            return response()->json($validation->errors(),202);
        }
             $allData=$request->all();
          
             $allData['password']=bcrypt($allData['password']);
           

            $user=User::create($allData);

             $resArr=[];
             $resArr['token']=$user->createToken('api-application')->accessToken;
             $resArr['name']=$user->name;

             return response()->json($resArr,200);
     
    }

    function login(Request $request){
        $validation=Validator::make($request->all(),[
           
            'email'=>'required|email',
            'password'=>'required',
            
         ]);
         if($validation->fails()){
            return response()->json($validation->errors(),202);
        }
        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ])){
            $user=Auth::user();
            $resArr=[];
            $resArr['token']=$user->createToken('api-application')->accessToken;
            $resArr['name']=$user->name;
            return response()->json($resArr,200);
     
        }
        else{
            return response()->json(['error'=>'unauthorized access'],203);
        }
    }
}
