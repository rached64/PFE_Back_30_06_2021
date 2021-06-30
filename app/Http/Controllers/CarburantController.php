<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CarburantResource ;
use App\Models\Carburant ;

class CarburantController extends Controller
{
    public function index()
    {
        $carburant= Carburant::all();
        return CarburantResource::collection($carburant);
    }

    public function store(Request $request)
    {
        $carburant = new Carburant();
        $carburant->nom_carburant = $request->nom_carburant ;
        if($carburant->save()){
            return new CarburantResource($carburant);
        }
    }

    public function update(Request $request, $id)
    {
        $carburant = Carburant::findOrFail($id);
        $carburant->nom_carburant = $request->nom_carburant ;
        if($carburant->save()){
            return new CarburantResource($carburant);
        }
    }

    public function destroy($id)
    {
        $carburant = Carburant::findOrFail($id);
        if($carburant->delete()){
            return new CarburantResource($carburant);
        }
    }
}
