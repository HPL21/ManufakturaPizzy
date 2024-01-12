<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/comments',[CommentsController::class,'index'])->name('comments');
Route::get('/create',[CommentsController::class,'create'])->name('create');
Route::post('/store',[CommentsController::class,'store'])->name('store');
Route::get('/delete/{id}',[CommentsController::class,'destroy'])->name('delete');
Route::get('/edit/{id}', [CommentsController::class,'edit'])->name('edit');
Route::post('/update/{id}', [CommentsController::class,'update'])->name('update');
