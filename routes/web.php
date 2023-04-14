<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DishController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProfileController;
use DebugBar\DataCollector\LocalizationCollector;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CategoryController::class,'index'])->name('index')->middleware('auth');
Route::get('dishes/index', [DishController::class,'index'])->name('dish.index')->middleware('auth');
Route::get('/menu/{category?}',[HomeController::class,'index'])->name('menu');
Route::get('menu/locale/{lang}',[LocalizationController::class,'setLang']);
Route::middleware('auth')->group(function () {
    Route::resource('/categories',CategoryController::class);
    Route::resource('/dishes',DishController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
