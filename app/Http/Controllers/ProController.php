<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash ;
use App\Models\Pro;
use Tymon\JWTAuth\Facades\JWTAuth ;
use Tymon\JWTAuth\Exceptions\JWTExceptions;
use Illuminate\Support\Facades\DB;

use App\Http\Resources\ProResource ;




class ProController extends Controller
{
    public function register(Request $request){
        $user= Pro::where('email',$request['email'])->first();
        if($user){
            $response['status']=0;
            $response['message']='Email existe';
            $response['code']= 409;
        }else {
            $user= Pro::create([
                'nom' => $request->nom,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'telephone' => $request->telephone,
               // 'picture' => $request->picture,
                'SIERT' => $request->SIERT,
                'NomSociete' => $request->NomSociete,
                'catActivite' => $request->catActivite,
                'Adresse' => $request->Adresse,
                'codePostal' => $request->codePostal
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

    public function userProfile() {
        return response()->json(auth()->user());
    }
    public function update(Request $request,$id)
    {
        $id =  auth()->user()->$id; 
        $user =Pro::find($id);
        $user->nom            = $request->nom         ;
        $user->email          = $request->email       ;
        $user->telephone      = $request->telephone   ;
        $user->SIERT          = $request->SIERT       ;
        $user->NomSociete     = $request->NomSociete  ;
        $user->catActivite    = $request->catActivite ;
        $user->Adresse        = $request->Adresse     ;
        $user->codePostal     = $request->codePostal  ;
        $result= $user->save();
        if($result){
            return ["result"=>"Profile has been updated"];
         }
         else {
            return ["result"=>"Profile Not has been updated"];

         }
        
    }
    public function index()
    {
        $user= Pro::all();
        return ProResource::collection($user);
    }
    public function store(Request $request)
    {
        $user = new Pro();
        $user->nom = $request->nom ;
        $user->email = $request->email ;
        $user->telephone = $request->telephone ;
        if($user->save()){
            return new ProResource($user);
        }
    }
    public function updateUser(Request $request, $id)
    {
        $user = Pro::findOrFail($id);
        $user->nom = $request->nom ;
        $user->email = $request->email ;
        $user->telephone = $request->telephone ;
        if($user->save()){
            return new ProResource($user);
        }
    }
    public function destroy($id)
    {
        $user = Pro::findOrFail($id);
        if($user->delete()){
            return new ProResource($user);
        }
    }
    public function registerSimple(Request $request){
        $user= Pro::where('email',$request['email'])->first();
        if($user){
            $response['status']=0;
            $response['message']='Email existe';
            $response['code']= 409;
        }else {
            $user= Pro::create([
                'nom' => $request->nom,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'telephone' => $request->telephone,
            ]);
            $response['status']=1;
            $response['message']='utlisateur crée avec succes';
            $response['code']= 200;
        }  
        return response()->json($response);
    }


  
}
