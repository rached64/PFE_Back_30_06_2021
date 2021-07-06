<?php

namespace App\Http\Controllers;

use App\Http\Resources\MarqueResource ;
use App\Models\Marque ;

use Illuminate\Http\Request;

class MarqueController extends Controller
{

    public function index()
    {
        $marque= Marque::all();
        return MarqueResource::collection($marque);
    }

    public function store(Request $request)
    {
        $marque = new Marque();
        $marque->nom = $request->nom ;
        if($marque->save()){
            return new MarqueResource($marque);
        }
    }

    public function update(Request $request, $id)
    {
        $marque = Marque::findOrFail($id);
        $marque->nom = $request->nom ;
        if($marque->save()){
            return new MarqueResource($marque);
        }
    }

    public function destroy($id)
    {
        $marque = Marque::findOrFail($id);
        if($marque->delete()){
            return new MarqueResource($marque);
        }
    }
}
