<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profile_controller;
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
Route::get('/', [Controller::class,'index']);
//Route::get('/blog',[usersController::class,'index']);

Route::prefix('/profiles')->group(function(){
    Route::get('/create', [profile_controller::class,'create'])->name('profile.createprofile');
   
    Route::get('/edit/{profileId}', [profile_controller::class,'edit'])->name('profile.editprofile');
    Route::post('/', [profile_controller::class,'store'])->name('profile.storeprofile');
    
    
    
    

    Route::get('/{profileId}', [profile_controller::class,'show'])->name('profile.showprofile');

    
    Route::patch('/{profileId}', [profile_controller::class,'update'])->name('profile.updateprofile');
    Route::delete('/{profileId}', [profile_controller::class,'destroy'])->name('profile.deleteprofile');
    
    Route::get('/', [profile_controller::class,'index'])->name('profile.index');
});
