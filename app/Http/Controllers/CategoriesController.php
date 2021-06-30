<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CategoriesResource ;
use App\Models\Categories ;
use App\Models\Post ;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Categories::all();
        return CategoriesResource::collection($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Categories();
        $categories->name = $request->name ;
        $categories->description = $request->description ;
       // $categories->picture = $request->picture ;
     //   $categories -> picture= $request->file('file')->store('images'); 

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
            $path = $request->file('picture')->storeAs('/images',$fileNameToStore);
            $categories->picture = $fileNameToStore ;
            $path = storage_path();

               $categories->save(); 
        }


        if($categories->save()){
            return new CategoriesResource($categories);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Categories::findOrFail($id);
        return new CategoriesResource($categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories = Categories::findOrFail($id);
        $categories->name = $request->name ;
        $categories->description = $request->description ;
        $categories->picture = $request->picture ;
        if($categories->save()){
            return new CategoriesResource($categories);
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
        $categories = Categories::findOrFail($id);
        if($categories->delete()){
            return new CategoriesResource($categories);
        }
    }
  
}
