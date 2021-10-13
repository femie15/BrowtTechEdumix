<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Components\Topics\Save;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::post('score',[UserController::class,'getData']);
Route::post('att',[UserController::class,'getAtt']);

Route::post('topics',[Save::class,'store'])->name('summernotePersist');
