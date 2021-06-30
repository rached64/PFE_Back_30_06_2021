<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipement;
use App\Http\Resources\equipementResource;
use Illuminate\Support\Facades\DB;

class EquipementController extends Controller
{

    public function index(Request $request)
{
   // $equipment= Equipement::all();
   // return equipementResource::collection($equipment);
    return response()->json(Equipement::all());


 // $comments = Equipement::find(1)->categories->name;
 //  return $comments ;

}
public function store(Request $request)
{
      
    $Equipement = new Equipement();
    $Equipement->id             = $request->id             ;  
    $Equipement->title          = $request->title          ;
    $Equipement->description    = $request->description    ;
    $Equipement->price          = $request->price          ; 
    $Equipement->category_id    =$request ->get('category_id');

    if($Equipement->save()){
        return response()->json(['message'=>'post added successfult']);
    }

}


}
