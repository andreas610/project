<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\skillController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\pengaturanHalamanController;
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
Route::get('/', function (){
    return view('welcome');

});
Route::prefix('dashboard')->group(
    function (){
        Route::get('/',[HalamanController::class, 'index']);
        Route::resource('halaman',HalamanController::class);
        Route::resource('experience',experienceController::class);
        Route::resource('education',educationController::class);
        Route::get('skill',[skillController::class,'index'])->name('skill.index');
        Route::post('skill',[skillController::class,'update'])->name('skill.update');
        Route::get('profile',[profileController::class,'index'])->name('profile.index');
        Route::post('profile',[profileController::class,'update'])->name('profile.update');
        Route::get('pengaturanhalaman',[pengaturanhalamanController::class,'index'])->name('pengaturanhalaman.index');
        Route::post('pengaturanhalaman',[pengaturanhalamanController::class,'update'])->name('pengaturanhalaman.update');
    }
);