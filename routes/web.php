<?php

use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TelevisionController;
use Illuminate\Support\Facades\Route;



Route::get('/movie', function () {
    return view('movie.index');
});

Route::get('/',[MovieController::class,'index'])->name('movie.index');
Route::get('movie/{movie}',[MovieController::class,'show'])->name('movie.show');

Route::get('actor',[ActorController::class,'index'])->name('actor.index');
Route::get('actor/{actor}',[ActorController::class,'show'])->name('actor.show');
Route::get('/actor/page/{page}' ,[ActorController::class,'index']);

Route::get('/television' ,[TelevisionController::class,'index'])->name('television.index');
Route::get('/television/{television}' ,[TelevisionController::class,'show'])->name('television.show');
Route::get('/television/page/{page}' ,[TelevisionController::class,'index']);


