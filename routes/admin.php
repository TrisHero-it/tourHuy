<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\TourController;
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

Route::get('/', [HomeController::class, 'login']);

// Route::middleware('check.login.admin')->group(function () {

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit']);
Route::get('/categories/{id}/delete', [CategoryController::class, 'delete']);

Route::get('/orders', [OrderController::class, 'index']);

Route::get('/tours', [TourController::class, 'index']);
Route::get('/tours/create', [TourController::class, 'create']);
Route::get('/tours/{id}/edit', [TourController::class, 'edit']);
Route::get('/tours/{id}/delete', [TourController::class, 'delete']);

Route::get('/banners', [BannerController::class, 'index']);
Route::get('/banners/create', [BannerController::class, 'create']);

Route::get('/logos', [LogoController::class, 'index']);
Route::get('/logos/create', [LogoController::class, 'create']);
Route::get('/logos/{id}/edit', [LogoController::class, 'edit']);
Route::get('/logos/{id}/delete', [LogoController::class, 'delete']);

Route::get('/footers', [FooterController::class, 'index']);
Route::get('/footers/create', [FooterController::class, 'create']);
Route::get('/footers/{id}/edit', [FooterController::class, 'edit']);
Route::get('/footers/{id}/delete', [FooterController::class, 'delete']);

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/create', [BlogController::class, 'create']);
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit']);
Route::get('/blogs/{id}/delete', [BlogController::class, 'delete']);

// });