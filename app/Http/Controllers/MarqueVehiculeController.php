<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\MarqueVehiculeResource ;
use App\Models\MarqueVehicule ;


class MarqueVehiculeController extends Controller
{
    public function index()
    {
        $marque= MarqueVehicule::all();
        return MarqueVehiculeResource::collection($marque);
    }

    public function store(Request $request)
    {
        $marque = new MarqueVehicule();
        $marque->nom = $request->nom ;
        $marque->modele_id  = $request['modele_id']  ; 
        if($marque->save()){
            return new MarqueVehiculeResource($marque);
        }
    }

    public function update(Request $request, $id)
    {
        $marque = MarqueVehicule::findOrFail($id);
        $marque->nom = $request->nom ;
        $marque->modele_id  = $request['modele_id']  ; 

        if($marque->save()){
            return new MarqueVehiculeResource($marque);
        }
    }

    public function destroy($id)
    {
        $marque = MarqueVehicule::findOrFail($id);
        if($marque->delete()){
            return new MarqueVehiculeResource($marque);
        }
    }
}
