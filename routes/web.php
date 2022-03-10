<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('CheckAuth')->group(function(){
    Route::get('/', function () {
        return view('layouts.index');
    })->name('index');
    Route::prefix('/posts')->group(function(){
        Route::get('index',[PostController::class,'index'])->name('post.index');
        Route::get('create',[PostController::class,'create'])->name('post.showFormCreate');
        Route::post('create',[PostController::class,'store'])->name('post.create');
        Route::get('{id}/delete',[PostController::class,'destroy'])->name('post.delete');
        Route::get('{id}/update',[PostController::class,'edit'])->name('post.showFormUpdate');
        Route::post('{id}/update',[PostController::class,'update'])->name('post.update');
        Route::get('{id}/detail',[PostController::class,'show'])->name('post.detail');

    });

});

Route::prefix('/auth')->group(function(){
    Route::get('register',[AuthController::class,'showFormRegister'])->name('showFormRegister');
    Route::post('register',[AuthController::class,'register'])->name('register')->middleware('CheckRegister');
    Route::get('login',[AuthController::class,'showFormLogin'])->name('showFormLogin');
    Route::post('login',[AuthController::class,'login'])->name('login');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
Route::get('show',function(){
    return view('show');
});





