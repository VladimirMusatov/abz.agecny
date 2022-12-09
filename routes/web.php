<?php

use App\Http\Controllers\MainContoller;
use App\Http\Controllers\PositionsController;
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

Route::get('/dashboard',[MainContoller::class, 'index'])->middleware(['auth' , 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/create',[MainContoller::class, 'create'])->name('create');
    Route::post('/store',[MainContoller::class, 'store'])->name('store');
    Route::get('/show/{id}', [MainContoller::class, 'show'])->name("show");
    Route::get('/delete/{id}', [MainContoller::class, 'delete'])->name('delete');
    Route::get('/edit/{id}', [MainContoller::class, 'edit'])->name('edit');
    Route::post('/update/{id}',[MainContoller::class,'update'])->name('update');


    Route::get('/position-list',[PositionsController::class, 'index'])->name('positions-list');
    Route::get('/position-create', [PositionsController::class, 'create'])->name('positions-create');
    Route::post('/position-store', [PositionsController::class, 'store'])->name('positions-store');
    Route::get('/position-edit',[PositionsController::class, 'edit'])->name('positions-edit');
    Route::post('/position-update',[PositionsController::class, 'update'])->name('positions-update');
    Route::get('positions-delete/{id}',[PositionsController::class, 'delete'])->name('positions-delete');

});

require __DIR__.'/auth.php';
