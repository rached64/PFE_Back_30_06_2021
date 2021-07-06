<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoriesController ;
use \App\Http\Controllers\PostsController ;
use \App\Http\Controllers\PictureController ;
use \App\Http\Controllers\CountrieControlle ;
use \App\Http\Controllers\CitiesControlle ; 
use \App\Http\Controllers\StateControlle ;
use \App\Http\Controllers\DetaillePostController ;
use \App\Http\Controllers\usersController ;

use \App\Http\Controllers\PostController ;
use \App\Http\Controllers\ProfileController ;
use \App\Http\Controllers\ProController;

use \App\Http\Controllers\MarqueController;
use \App\Http\Controllers\ModeleController;
use \App\Http\Controllers\CarburantController;
use \App\Http\Controllers\MarqueVehiculeController;
use \App\Http\Controllers\PostVehiculeController;
use \App\Http\Controllers\EquipementController;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('images/{filename}', function ($filename)
{
    
    $path='C:/ionic/data/'.$filename;

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
// categories
Route::get('/categories',[CategoriesController::class,'index']);

Route::post('/Addcategories',[CategoriesController::class,'store']);

Route::get('/categories/{id}',[CategoriesController::class,'show']);

Route::put('/updatecategorie/{id}',[CategoriesController::class,'update']);

Route::delete('/categories/{id}',[CategoriesController::class,'destroy']);


//Country
Route::get('/country',[CountrieControlle::class,'index']);

Route::get('/citie/{id}',[CitiesControlle::class,'getCities']);

Route::get('/state/{id}',[StateControlle::class,'getState']);

//search
//Route::get('/search/{title}',[PostsController::class,'search']);

//DetaillePost
Route::get('/detaillePost/show',[DetaillePostController::class,'Show']);

Route::get('/detaillePost/{id}',[DetaillePostController::class,'showById']);


Route::post('/detaillePost/add',[DetaillePostController::class,'add']);

Route::put('/detaillePost/{id}',[DetaillePostController::class,'update']);

Route::delete('/detaillePost/{id}',[DetaillePostController::class,'destroy']);

//Auth
Route::post('/register',[usersController::class,'register']);

Route::post('/login',[usersController::class,'login']);
Route::post('/simpleuser/{token}',[usersController::class,'simpleuserProfile']);



///new Post


Route::get('/post',[PostController::class,'index']);

Route::post('/post/add',[PostController::class,'store']);

Route::get('/show/{id}',[PostController::class,'show']);

Route::put('/update/{id}',[PostController::class,'update']);

Route::delete('/delete/{id}',[PostController::class,'destroy']);

Route::get('/show/category/{id}',[PostController::class,'showByCategorie']);

Route::get('/search/{title}',[PostController::class,'search']);
 
 Route::get('/join/{title}',[PostController::class,'JoinTable']);

 Route::get('/show/userProduct/{id}',[PostController::class,'showProductByUser']);


 //profile

Route::put('/updatePro/{id}',[ProfileController::class,'update']);
Route::delete('/deleteProfile/{id}',[ProfileController::class,'destroy']);


Route::post('/registerPro',[ProController::class,'register']);


Route::post('/registerSimplePro',[ProController::class,'registerSimple']);
Route::post('/loginPro',[ProController::class,'login']);

Route::get('/user-profile/{token}', [ProController::class, 'userProfile']);    

Route::put('/updateProfile/{id}', [ProController::class, 'update']);    

//user
Route::get('/users',[ProController::class,'index']);
Route::post('/Addusers',[ProController::class,'store']);
Route::put('/UpdateUser/{id}',[ProController::class,'updateUser']);
Route::delete('/deleteUser/{id}',[ProController::class,'destroy']);

//Marque
Route::get('/marque',[MarqueController::class,'index']);
Route::post('/AddMarque',[MarqueController::class,'store']);
Route::put('/UpdateMarque/{id}',[MarqueController::class,'update']);
Route::delete('/deleteMarque/{id}',[MarqueController::class,'destroy']);

//modele
Route::get('/modele',[ModeleController::class,'index']);
Route::post('/AddModele',[ModeleController::class,'store']);
Route::put('/UpdateModele/{id}',[ModeleController::class,'update']);
Route::delete('/deleteModele/{id}',[ModeleController::class,'destroy']);

//carburant
Route::get('/carburant',[CarburantController::class,'index']);
Route::post('/AddCarburant',[CarburantController::class,'store']);
Route::put('/UpdateCarburant/{id}',[CarburantController::class,'update']);
Route::delete('/deleteCarburant/{id}',[CarburantController::class,'destroy']);

//marqueVehicule
Route::get('/marqueM',[MarqueVehiculeController::class,'index']);
Route::post('/AddMarqueM',[MarqueVehiculeController::class,'store']);
Route::put('/UpdateMarqueM/{id}',[MarqueVehiculeController::class,'update']);
Route::delete('/deleteMarqueM/{id}',[MarqueVehiculeController::class,'destroy']);


Route::get('/annonce',[PostVehiculeController::class,'index']);
Route::post('/Addannonce',[PostVehiculeController::class,'add']);
Route::put('/Updateannonce/{id}',[PostVehiculeController::class,'update']);
Route::delete('/deleteannonce/{id}',[PostVehiculeController::class,'delete']);
Route::post('/addEquipment',[PostVehiculeController::class,'addEquipment']);
Route::get('/showEquipment/{id}',[PostVehiculeController::class,'show']);
Route::delete('/deleteAnnonce/{id}',[PostVehiculeController::class,'delete']);
Route::post('/AddImage', [PostVehiculeController::class, 'uploadimage'])->name('AddImage');

Route::get('/equipment',[EquipementController::class,'index']);
Route::post('/equipmentAdd',[EquipementController::class,'store']);
