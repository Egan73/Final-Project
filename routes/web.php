<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\CustomAuthController;


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
    return view('index');
});

//Route for song
Route::get('/song', 'SongController@SongShow');
Route::post('/song/addsong','SongController@addsong');
Route::get('/song/removesong/{id}','SongController@removesong');
Route::get('/song/editsong/{id}','SongController@editsong');
Route::post('/song/updatesong/{id}','SongController@updatesong');

//Route for home
Route::get('/home', function(){return view('view_home');});

//Route for Login
Route::get('/login',[CustomAuthController::class,'login']);
Route::get('/registration',[CustomAuthController::class,'registration']);
