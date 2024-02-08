<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\RedirectController;

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


Route::group(['middleware' => 'guest'], function() {
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'dologin']);

});


Route::group(['middleware' => ['auth']], function() {  
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


Route::group(['middleware' => ['auth', 'checkrole:a89a8627-4842-4a54-8d24-98172a8709f9']], function() {
  
});


Route::get('/admin-dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::resource('role-admin', 'App\Http\Controllers\Admin\AdminRoleController');

Route::resource('project-admin', 'App\Http\Controllers\Admin\AdminProjectController');
Route::resource('user-admin', 'App\Http\Controllers\Admin\AdminUserController');
Route::resource('gallery-admin', 'App\Http\Controllers\Admin\AdminGalleryController');


