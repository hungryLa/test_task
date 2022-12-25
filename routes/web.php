<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();
Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

use App\Http\Controllers\CommonController;

use App\Http\Controllers\NewsController;
Route::get('', [NewsController::class,'index'])->name('index');
Route::group(['prefix'=>'news'],function(){
    Route::get('', [NewsController::class,'index'])->name('news.index');
    Route::get('/{id}',[NewsController::class,'show'])->name('news.show');
});

Route::group(['middleware'=>'auth'],function(){
    
});



