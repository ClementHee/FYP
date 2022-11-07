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
<<<<<<< Updated upstream
use App\Http\Controllers\event_types_controller;
use App\Http\Controllers\event_type_roles_controller;
use App\Http\Controllers\na_time_controller;
use App\Http\Controllers\CalenderController;


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
    Route::get('not_availabletime/{profile}/{time}/edit', [na_time_controller::class,'edit'])->name('not_availabletime.editthis');
    Route::match(['put', 'patch'],'not_availabletime/{profile}/{time}/edit', [na_time_controller::class,'update'])->name('not_availabletime.updatethis');
    Route::get('showsingle/{profile}', [profile_controller::class,'showsingle'])->name('showsingle');
    Route::get('create_na/{profile}', [profile_controller::class,'create_na'])->name('create_na');
    Route::resource('profile', profile_controller::class);
    Route::resource('not_availabletime', na_time_controller::class);
    Route::resource('usertype', user_role_permission_controller::class);
    Route::resource('roles', roles_controller::class);
    Route::resource('vtypes', volunteer_type_controller::class);
    Route::resource('users', user_controller::class);
    Route::resource('event',event_controller::class);
    Route::resource('eventtypes',event_types_controller::class);
    Route::resource('eventroles',event_type_roles_controller::class);
    Route::get('calendar-event', [CalenderController::class, 'index']);
    Route::post('calendar-crud-ajax', [CalenderController::class, 'calendarEvents']);
});



