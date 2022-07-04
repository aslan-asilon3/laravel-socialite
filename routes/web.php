<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\Auth\FacebookSocialiteController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// * socialite auth
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProvideCallback']);


// // google
// Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);

// Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// //facebook
// Route::get('auth/facebook', [FacebookSocialiteController::class, 'redirectToFB']);
// Route::get('callback/facebook', [FacebookSocialiteController::class, 'handleCallback']);

//Instagram
// Route::get('auth/instagramku', [InstagramController::class, 'redirectToInstagram']);
// Route::get('callback/instagramku', [InstagramController::class, 'handleCallback']);