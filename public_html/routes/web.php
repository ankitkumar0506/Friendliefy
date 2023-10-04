<?php

use App\Http\Controllers\FrontEnd\GoogleController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Login Routes

Route::get('/',[LoginController::class,'index'])->middleware('guest');
Route::get('/login',[LoginController::class,'index'])->middleware('guest');
Route::get('/register',[LoginController::class,'index'])->middleware('guest');
Route::post('/login',[LoginController::class,'validate_login']);
Route::post('/register',[LoginController::class,'store']);

// Logout Routes

Route::get('/logout',[LoginController::class,'logout']);

// Home Routes

Route::get('/home',[HomeController::class,'index']);

// Google Routes

Route::get('authorized/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [GoogleController::class, 'handleGoogleCallback']);
