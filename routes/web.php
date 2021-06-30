<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EquipementController;




Route::get('show', [PostController::class,'indexWeb']);

