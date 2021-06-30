<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash ;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth ;
use Tymon\JWTAuth\Exceptions\JWTExceptions;

class usersController extends Controller
{
    public function register(Request $request){
        $user= User::where('email',$request['email'])->first();
        if($user){
            $response['status']=0;
            $response['message']='Email existe';
            $response['code']= 409;
        }else {
            $user= User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            $response['status']=1;
            $response['message']='utlisateur crée avec succes';
            $response['code']= 200;
        }  
        return response()->json($response);
    }
    public function login(Request $request){
        $credentials=$request->only('email','password');
        try{
            if (!JWTAuth::attempt($credentials)){
                $response['status']=0;
                $response['code']= 401;
                $response['data']=null;
                $response['message']='email ou mot de passe invalide';
                return response()->json($response);

            }
        }catch(JWTException $e){
            $response['data']= null ;
            $response['code']= 500;
            $response['message']= 'could Not Create Token';
            return response()->json($response);

        }
        $user = auth()->user();
        $data['token']=auth()->claims([
            'user_id'=> $user->id,
            'email'=>$user->email
        ])->attempt($credentials);

        $response['data']= $data;
        $response['status']= 1;
        $response['code']= 200;
        $response['message']='Connexion réussite';
        return response()->json($response);

    }
    public function simpleuserProfile() {
        return response()->json(auth()->user());
    }

}