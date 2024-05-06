<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MovieController;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('account/profile',[AccountController::class,'profile'])->name('account.profile');

Route::group(['prefix'=>'account'],function(){
    Route::group(['middleware'=>'guest'],function(){
        Route::get('register',[AccountController::class,'register'])->name('account.register');
        Route::post('register',[AccountController::class,'processRegister'])->name('account.processRegister');
        Route::get('login',[AccountController::class,'login'])->name('account.login');
        Route::post('login',[AccountController::class,'authenticate'])->name('account.authenticate');
    });

    Route::group(['middleware'=>'auth'],function(){
        Route::get('profile',[AccountController::class,'profile'])->name('account.profile');
        Route::get('logout',[AccountController::class,'logout'])->name('account.logout');
        Route::post('update-profile',[AccountController::class,'updateProfile'])->name('account.updateProfile');
        Route::get('movies',[MovieController::class,'index'])->name('movies.index');
        Route::get('movies/create',[MovieController::class,'create'])->name('movies.create');
        Route::post('movies',[MovieController::class,'store'])->name('movies.store');
        Route::get('movies/edit/{id}',[MovieController::class,'edit'])->name('movies.edit');
        Route::post('movies/edit/{id}',[MovieController::class,'update'])->name('movies.update');
        Route::delete('movies/{id}',[MovieController::class,'drop'])->name('movies.drop');
    });
});

