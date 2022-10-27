<?php


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user_controller;
use App\Http\Controllers\event_controller;
use App\Http\Controllers\profile_controller;
use App\Http\Controllers\roles_controller;
use App\Http\Controllers\volunteer_type_controller;
use App\Http\Controllers\user_role_permission_controller;

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
Route::get('/', [HomeController::class,'index']);
Route::get('/home', [HomeController::class,'index']);
//Route::get('/blog',[usersController::class,'index']);


Auth::routes();
#self defined prefix

Route::group(['middleware' => ['auth']], function() {
    Route::resource('profile', profile_controller::class);
    Route::resource('usertype', user_role_permission_controller::class);
    Route::resource('roles', roles_controller::class);
    Route::resource('vtypes', volunteer_type_controller::class);
    Route::resource('users', user_controller::class);
    Route::resource('event',event_controller::class);
    Route::resource('memberprofile', profile_controller::class);
});


