<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController as HomeAdmin;
use App\Http\Controllers\Admin\ContactController as ContactAdmin;
use App\Http\Controllers\Admin\PropertyController as PropertyAdmin;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\front\ProjectController as ProjectFront;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\PropertyController;
use App\Http\Controllers\front\CurrentProjectsController;
use App\Http\Controllers\front\PreviousProjectsController;
use App\Http\Controllers\front\SettingController as SettingFront;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, 'index']);


Route::name('front.')->group(function () {
    Route::resource('contacts', ContactController::class);
    Route::post('sendMessage', [ContactController::class,'sendMessage'])->name('sendMessage');
    Route::resource('setting', SettingFront::class);
    Route::get('abouts', [ContactController::class, 'about'])->name('abouts');
    Route::get('login', [ContactController::class, 'login'])->name('login');
    Route::get('previous-projects', [PreviousProjectsController::class, 'index'])->name('previous-projects');
    Route::get('current-search', [PropertyController::class, 'search'])->name('current-search');
    Route::resource('properties',PropertyController::class);
    Route::resource('projecting',ProjectFront::class);

    
});
Route::name('dashboard.')->middleware('auth')->group(function () {  
    Route::resource('/admin', HomeAdmin::class);
    Route::resource('/departments', DepartmentController::class);
    Route::get('search-department', [DepartmentController::class,'search'])->name('search-department');
    Route::resource('/projects', ProjectController::class);
    Route::resource('/users', UserController::class);
    Route::get('search-user', [UserController::class,'search'])->name('search-user');
    Route::resource('/propertyAdmin', PropertyAdmin::class);
    Route::get('search-property', [PropertyAdmin::class,'search'])->name('search-property');
    Route::resource('/settings', SettingController::class);
    Route::resource('/contact', ContactAdmin::class);
});


Auth::routes();


