<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\StatusController;

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
Route::get('/', [HomeController::class, 'index'])->name('home');

// sign up routes
Route::get('/signup', [AuthController::class, 'getSignup'])
        ->name('signup.get')
        ->middleware('guest');

Route::post('/signup', [AuthController::class, 'postSignup'])
        ->name('signup.post')
        ->middleware('guest');

// sign in routes
Route::get('/signin', [AuthController::class, 'getSignin'])
        ->name('signin.get')
        ->middleware('guest');

Route::post('/signin', [AuthController::class, 'postSignin'])
        ->name('signin.post')
        ->middleware('guest');

// sign out route
Route::get('/signout', [AuthController::class, 'signOut'])
        ->name('signout');

// search route
Route::get('/search', [SearchController::class, 'getResults'])
        ->name('search');

// user route
Route::get('/user/{username}', [ProfileController::class, 'getProfile'])
        ->name('user');

// profile routes
Route::prefix('/profile')->name('profile.')->group(function() {
        Route::get('/edit', [ProfileController::class, 'getProfileEdit'])
                ->name('get.edit');
   
        Route::post('/edit', [ProfileController::class, 'postProfileEdit'])
                ->name('post.edit');
});

// friends routes
Route::prefix('/friends')->name('friends.')->group(function() {
        Route::get('/', [FriendsController::class, 'getIndex'])
                ->name('index');
        
        Route::get('/add/{username}', [FriendsController::class, 'getAdd'])
                ->name('add');
        
        Route::get('/accept/{username}', [FriendsController::class, 'getAccept'])
                ->name('accept');

        Route::get('/remove/{username}', [FriendsController::class, 'getRemoveFriend'])
                ->name('remove');
});

// status routes
Route::prefix('/status')->name('status.')->group(function() {
        Route::post('/', [StatusController::class, 'postStatus'])
                ->name('index');
        
        Route::post('/{statusID}/reply', [StatusController::class, 'postReply'])
                ->name('reply');
        
        Route::get('/{statusID}/like', [StatusController::class, 'getLike'])
                ->name('like');

});