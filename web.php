<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudenController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/muris',[StudenController::class,'muris']);
Route::post('/save',[StudenController::class,'save'])->name('george.send');
Route::get('/select',[StudenController::class,'select'])->name('user.select');
Route::get('/edit/{user}',[StudenController::class,'edit'])->name('george.edit');
Route::put('/update/{user}',[StudenController::class,'update'])->name('user.update');
Route::delete('/delete/{user}',[StudenController::class,'delete'])->name('george.delete');
Route::get('/login',[StudenController::class,'loginn'])->name('george.loginn');
Route::post('/login',[StudenController::class,'login'])->name('user.login');
Route::post('/logout',[StudenController::class,'logout'])->name('user.logout');