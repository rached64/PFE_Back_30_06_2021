<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource ;
use Illuminate\Support\Facades\DB;
use App\Models\Categories ;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\Validator;
use Session;
session_start();




class PostController extends Controller
{
    public function index()
    {
         $Post = Post::all();
        return PostResource::collection($Post);
    }
        public function add(Request $request)
        {
            return Post::create($request->all());
        }
    

    public function store(Request $request)
    {
          
   /*     $data = array();
        $data['id'] = $request->id;
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['price'] = $request->price;
        $data['category_id'] = $request->category_id;
        $data['user_id'] = $request->user_id;
  
        DB::table('post')->insert($data);
        Session::put('message', 'post addedd successfully!');*/
        $post = new post();
        $post->id             = $request->id             ;  
        $post->title          = $request->title          ;
        $post->description    = $request->description    ;
        $post->price          = $request->price          ; 
        $post->category_id        =$request ->get('category_id');
        $post->user_id              = $request['user_id']  ; 
   /*     
        $post->post_type_id   = $request->post_type_id   ;  
        $post->Modele = $request->Modele ;
        $post->BoiteDeVitesse = $request->BoiteDeVitesse ;
        $post->AnneeModele = $request->AnneeModele ;
        $post->Marque = $request->Marque ;
        $post->YearOfRegistration = $request->YearOfRegistration ;
        $post->TypePost = $request->TypePost ;
        $post->PuissanceFiscale = $request->PuissanceFiscale ;
        $post->Kilometrage = $request->Kilometrage ;
        $post->NombreDePortes = $request->NombreDePortes ;
        $post->NombreDePlaces = $request->NombreDePlaces ;
        $post->carburant = $request->carburant ;*/
   

    if($request->hasFile('picture')){
        //Storage::delete('/public/pictures/'.$user->picture);
        // Get filename with the extension
        $filenameWithExt = $request->file('picture')->getClientOriginalName();
        //Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
$extension = $request->file('picture')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('picture')->storeAs('public/images',$fileNameToStore);
   $post->picture = $fileNameToStore ;
   
           $post->save(); 
    }
    if($post->save()){
        //return new PostResource($post); 
        return response()->json(['message'=>'post added successfult']);
 }
      }




    public function show($id)
    {
          $post= Post::find($id);
          if (is_null($post)){
              return response()->json(['message'=>'Post Not Found'],404);
          }
          return response()->json($post::find($id),200);
    }
    public function showByCategorie($id)
    {        
            $post = Post::where('category_id', $id)->get();
            return new PostResource($post);        
    }
    public function showProductByUser($id)
    {        
            $post = Post::where('user_id', $id)->get();
            return new PostResource($post);        
    }
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->id             = $request->id             ;  

        $post->picture        = $request->picture          ;
        $post->title          = $request->title          ;
        $post->description    = $request->description    ;
        $post->price          = $request->price          ;  
     //   $post->category_id    = $request->category_id    ;  
     //   $post->post_type_id   = $request->post_type_id   ;  
     //   $post->user_id        = $request->user_id        ; 

        $post->Modele = $request->Modele ;
        $post->BoiteDeVitesse = $request->BoiteDeVitesse ;
        $post->AnneeModele = $request->AnneeModele ;
        $post->Marque = $request->Marque ;
        $post->YearOfRegistration = $request->YearOfRegistration ;
        $post->TypePost = $request->TypePost ;
        $post->PuissanceFiscale = $request->PuissanceFiscale ;
      //  $post->PuissanceDIN = $request->PuissanceDIN ;
        $post->Kilometrage = $request->Kilometrage ;
        $post->NombreDePortes = $request->NombreDePortes ;
        $post->NombreDePlaces = $request->NombreDePlaces ;
        $post->carburant = $request->carburant ;
     //   $post->Permis = $request->Permis ;
        if($post->save()){
            return new PostResource($post);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->delete())
            {
               return new PostResource($post);
            }
    }
    public function search($text){
    if ($text){
        return Post::where("title","like" ,"%". $text."%")
        ->orWhere( 'price', "like" ,"%". $text."%")
        ->orWhere( 'description', "like" ,"%". $text."%")
        ->orWhere( 'Modele', "like" ,"%". $text."%")
        ->get();
      }
    }
      /*
   $data= Post::whereHas('Categories',function($q) use($text)
    {
        $q->where('name',"like" ,"%". $text."%");
        $q->orwhere('description',"like" ,"%". $text."%");
        $q->orwhere('price',"like" ,"%". $text."%");
    })
        ->orWhereHas('User',function($q) use($text)
        {
        $q->where('email',"like" ,"%". $text."%");
    })
    ->get();
    return response()->json([
        'msg' => 'Success',
        'data' => $data
        ]);
    }*/

    public function JoinTable($text){
     $data = DB::table('posts')
     // $data = Post::join('categories', 'post.category_id', '=', 'categories.id')
          //     ->join('users', 'posts.user_id', '=', 'users.id')
        //     ->join('post_types', 'posts.post_type_id ', '=', 'post_types.id')

            ->join('categories', 'posts.category_id', '=', 'categories.id')
        ->select('post.title' ,'categories.name') 
             ->get();
     return response()->json([
        'msg' => 'Success',
        'data' => $data
        ]);
    }
// Laravel web



}
