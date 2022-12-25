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
Auth::routes(['verify' => true]);
Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\NewsController;

Route::get('', [NewsController::class, 'index'])->name('index');
Route::group(['prefix' => 'news'], function () {
    Route::get('', [NewsController::class, 'index'])->name('news.index');
    Route::get('/{id}', [NewsController::class, 'show'])->name('news.show');
});

use App\Http\Controllers\CabinetController;
Route::group(['middleware' => ['auth','verified'], 'prefix' => 'cabinet'], function () {
    Route::get('/news',[CabinetController::class,'news'])->name('cabinet.news');
    Route::get('/news/create',[CabinetController::class,'create'])->name('cabinet.news.create');
    Route::post('/news',[CabinetController::class,'store'])->name('cabinet.news.store');
    Route::get('/news/{news}/edit',[CabinetController::class,'edit'])->name('cabinet.news.edit');
    Route::put('/news/{news}',[CabinetController::class,'update'])->name('cabinet.news.update');
    Route::delete('/news/{news}',[CabinetController::class,'destroy'])->name('cabinet.news.destroy');
});



