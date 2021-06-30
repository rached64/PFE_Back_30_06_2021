<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Http\Resources\profileResource ;


class ProfileController extends Controller
{
    public function update(Request $request, $id)
    {
        $profil =Profile::find($id);
        $profil->nom            = $request->nom ;
        $profil->email          = $request->email ;
        $profil->password       = $request->password ;
        $profil->telephone      = $request->telephone ;
        $profil->user_id       = $request->user_id ;
        //      $profil->picture        = $request->picture ;
        $result= $profil->save();
        if($result){
            return ["result"=>"data has been updated"];
         }
         else {
            return ["result"=>"data Not has been updated"];

         }
    }


    public function destroy($id)
    {
        $profil = profile::findOrFail($id);
        if($profil->delete()){
            return new profileResource($profil);
        }
    }
}
