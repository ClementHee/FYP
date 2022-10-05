<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;
use App\Http\Controllers\congregationController;

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

//Route::get('/blog',[usersController::class,'index']);

Route::get('/profiles/create', [profileController::class,'create'])->name('profile.createprofile');
Route::get('/profiles/create', [congregationController::class,'index'])->name('profile.createprofile');;
Route::get('/profiles', [profileController::class,'index'])->name('profile.index');
Route::get('/profiles/{userId}', [profileController::class,'show'])->name('profile.showprofile');


Route::post('/profiles', [profileController::class,'store'])->name('profile.storeprofile');

Route::get('/profiles/edit/1', [profileController::class,'edit']);
Route::patch('/profiles/1', [profileController::class,'update']);

Route::delete('/profiles/1', [profileController::class,'delete']);

//Route::get('/profiles/create', [congregationController::class, 'index'])->name('');
