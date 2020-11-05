<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// home routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);

// sign up routes
Route::get('/signup', [AuthController::class, 'getSignup']);
Route::post('/signup', [AuthController::class, 'postSignup']);

// sign in routes
Route::get('/signin', [AuthController::class, 'getSignin']);
Route::post('/signin', [AuthController::class, 'postSignin']);


// testing routes
#Route::get('/alert', function() {
#    return redirect('/')->with('info', 'You have sign up!');
#});