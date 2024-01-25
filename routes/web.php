<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RestaurantController;

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
})->name('welcome');


Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/restaurant', [RestaurantController::class, 'index'])->name('restaurant');
    Route::get('/restaurantCreate', [RestaurantController::class, 'create'])->name('restaurantCreate');
    Route::get('/restaurantStore/{id}', [RestaurantController::class, 'store'])->name('restaurantStore');
    Route::post('/pizzaCreate', [RestaurantController::class, 'pizzaCreate'])->name('pizzaCreate');
    Route::get('/restaurantSummary', [RestaurantController::class, 'summary'])->name('restaurantSummary');
    Route::post('/restaurantPlaceOrder', [RestaurantController::class, 'placeOrder'])->name('restaurantPlaceOrder');
    Route::get('/restaurantRemovePizza/{id}', [RestaurantController::class, 'removePizza'])->name('restaurantRemovePizza');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::get('/adminEditOrder/{id}', [AdminController::class, 'adminEditOrder'])->name('adminEditOrder');
    Route::put('/adminUpdateOrder/{id}', [AdminController::class, 'adminUpdateOrder'])->name('adminUpdateOrder');
    Route::get('/adminDeleteOrder/{id}', [AdminController::class, 'adminDeleteOrder'])->name('adminDeleteOrder');
    Route::get('/adminCompleteOrder/{id}', [AdminController::class, 'adminCompleteOrder'])->name('adminCompleteOrder');
    Route::get('/adminShowOrder/{id}', [AdminController::class, 'adminShowOrder'])->name('adminShowOrder');
    Route::get('/adminSorted', [AdminController::class, 'adminSorted'])->name('adminSorted');
});