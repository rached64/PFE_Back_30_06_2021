<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ModeleResource ;
use App\Models\Modele ;

class ModeleController extends Controller
{
    public function index()
    {
        $marque= Modele::all();
        return ModeleResource::collection($marque);
    }

    public function store(Request $request)
    {
        $marque = new Modele();
        $marque->nom = $request->nom ;
        if($marque->save()){
            return new ModeleResource($marque);
        }
    }

    public function update(Request $request, $id)
    {
        $marque = Modele::findOrFail($id);
        $marque->nom = $request->nom ;
        if($marque->save()){
            return new ModeleResource($marque);
        }
    }

    public function destroy($id)
    {
        $marque = Modele::findOrFail($id);
        if($marque->delete()){
            return new ModeleResource($marque);
        }
    }
}
