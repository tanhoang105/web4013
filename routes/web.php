<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Matching\HostValidator;

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



//chỉ cần config đối với trang đăng nhập
Route::get('login' , [LoginController::class , 'getLogin'])->name('login');
Route::post('/login' , [LoginController::class , 'postLogin']);
Route::middleware(['auth'])->group(function(){
   
    Route::prefix('user')->name('user.')->group(function(){
        Route::get('/', [UserController::class , 'index'])->name('home');
        Route::get('/update', [UserController::class , 'update'])->name('update-user');
        Route::get('/me', [MeController::class , 'index'])->name('me');
        Route::get('/cate', [CateController::class , 'index'])->name('cate');
        // Route::post('/cate', [CateController::class , 'index'])->name('postCate');
    });
});







