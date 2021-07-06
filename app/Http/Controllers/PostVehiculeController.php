<?php

namespace App\Http\Controllers;
use App\Models\PostVehicule;
use Illuminate\Http\Request;
use App\Http\Resources\VehiculeResource ;

class PostVehiculeController extends Controller
{
    public function index()
    {
         $Post = PostVehicule::all();
        return VehiculeResource::collection($Post);
    }
    public function add(Request $request){
        $p=new PostVehicule();
        $p->title=        $request->title;
        $p->description=  $request->description;
        $p->price=        $request->price;
        $p->TypePost=     $request->TypePost;
        $p->category=      $request->category;
        $p->Modele=        $request->Modele;
        $p->Marque=        $request->Marque;
        $p->BoiteDeVitesse=$request->BoiteDeVitesse;
        $p->AnneeModele=$request->AnneeModele;
        $p->PuissanceFiscale=$request->PuissanceFiscale;
        $p->Kilometrage=$request->Kilometrage;
        $p->NombreDePortes=$request->NombreDePortes;
        $p->NombreDePlaces=$request->NombreDePlaces;
        $p->carburant=$request->carburant;

       if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $img_extension = $image_file->getClientOriginalExtension();
            $img_filename = time() . '.' . $img_extension;
            $path ='C:/ionic/data/';
            $image_file->move($path, $img_filename);
            $p->image = $img_filename;
        }

        if($p->save()){
            return response()->json(['message'=>'Image added successfult']);
     }
    }
    public function uploadimage(Request $request) {
        $p=new PostVehicule();
        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $img_extension = $image_file->getClientOriginalExtension();
            $img_filename = time() . '.' . $img_extension;
            $path ='C:/ionic/data/';
            $image_file->move($path, $img_filename);
            $p->image = $img_filename;

        }

        if($p->save()){
            //return new PostResource($post); 
            return response()->json(['message'=>'Image added successfult']);
     }

    }




    public function addEquipment(Request $request){


     $p=new PostVehicule();
        $p->title=        $request->title;
        $p->description=  $request->description;
        $p->price=        $request->price;
        $p->category=      $request->category;

        if ($request->hasFile('image')) {
            $image_file = $request->file('image');
            $img_extension = $image_file->getClientOriginalExtension();
            $img_filename = time() . '.' . $img_extension;
            $path ='C:/ionic/data/';
            $image_file->move($path, $img_filename);
            $p->image = $img_filename;
        }

        

        if($p->save()){
            //return new PostResource($post); 
            return response()->json(['message'=>'post added successfult']);
     }
    }

    public function update(Request $request){
        $p = PostVehicule::find($request->id);
        $p->title=        $request->title;
        $p->description=  $request->description;
        $p->price=        $request->price;
        $p->TypePost=     $request->TypePost;
        $p->category=      $request->category;
        $p->Modele=        $request->Modele;
        $p->Marque=        $request->Marque;
        $p->BoiteDeVitesse=$request->BoiteDeVitesse;
        $p->AnneeModele=$request->AnneeModele;
        $p->PuissanceFiscale=$request->PuissanceFiscale;
        $p->Kilometrage=$request->Kilometrage;
        $p->NombreDePortes=$request->NombreDePortes;
        $p->NombreDePlaces=$request->NombreDePlaces;
        $p->carburant=$request->carburant;
        $p->image=$request->image;
        $p->save();
        return response()->json(['message'=>"annonce mise à jour avec réussi"]);
    }

    public function delete($id)
    {
        $post = PostVehicule::findOrFail($id);
        if($post->delete())
            {
               return new VehiculeResource($post);
            }
    }
    public function show($id)
    {
          $p= PostVehicule::find($id);
          if (is_null($p)){
              return response()->json(['message'=>'Post Equipment Not Found'],404);
          }
          return response()->json($p::find($id),200);
    }



}
