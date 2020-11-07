<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;

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

// search route
Route::get('/search', [SearchController::class, 'getResults']);

// profiles route
Route::get('/user/{username}', [ProfileController::class, 'getProfile']);

Route::get('profile/edit', [ProfileController::class, 'getProfileEdit']);
Route::post('profile/edit', [ProfileController::class, 'postProfileEdit']);

// testing routes
#Route::get('/alert', function() {
#    return redirect('/')->with('info', 'You have sign up!');
#});