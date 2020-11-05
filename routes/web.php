<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
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
Route::get('/signup', [AuthController::class, 'getSignup'])
        ->middleware('guest');
Route::post('/signup', [AuthController::class, 'postSignup'])
        ->middleware('guest');
// sign in routes
Route::get('/signin', [AuthController::class, 'getSignin'])
        ->middleware('guest');
Route::post('/signin', [AuthController::class, 'postSignin'])
        ->middleware('guest');

// sign out route
Route::get('/signout', [AuthController::class, 'signOut']);

// search routes
Route::get('/search', [SearchController::class, 'getResults']);


// testing routes
#Route::get('/alert', function() {
#    return redirect('/')->with('info', 'You have sign up!');
#});