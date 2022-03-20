<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cakecontroller;
use App\Http\Controllers\Usercontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/students',function(){
//     return ('studnts api');
// });

Route::middleware(['auth:santum'])->group(function({

    Route::get('/cakes',[Cakecontroller::class,'index']);

    Route::get('/cakes/{id}',[Cakecontroller::class,'show']);
    Route::post('/cakes',[Cakecontroller::class,'store']);
    Route::put('/cakes/{id}',[Cakecontroller::class,'update']);
    Route::delete('/cakes/{id}',[Cakecontroller::class,'destroy']);
    
    Route::get('/cakes/search/{id}',[Cakecontroller::class,'search']);
    
});
Route::post('/logout',[Usercontroller::class,'logout']);

Route::post('/register',[Usercontroller::class,'register']);
Route::post('/login',[Usercontroller::class,'register']);


