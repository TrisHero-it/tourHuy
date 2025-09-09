<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CategoryChildController;
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

Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

// Category Children routes
Route::get('/category-children', [CategoryChildController::class, 'index'])->name('admin.category-children.index');
Route::get('/category-children/create', [CategoryChildController::class, 'create'])->name('admin.category-children.create');
Route::post('/category-children', [CategoryChildController::class, 'store'])->name('admin.category-children.store');
Route::get('/category-children/{id}/edit', [CategoryChildController::class, 'edit'])->name('admin.category-children.edit');
Route::put('/category-children/{id}', [CategoryChildController::class, 'update'])->name('admin.category-children.update');
Route::delete('/category-children/{id}', [CategoryChildController::class, 'destroy'])->name('admin.category-children.destroy');

Route::get('/category-childs-by-category/{id}', [CategoryController::class, 'categoryChildsByCategory']);

Route::get('/orders', [OrderController::class, 'index']);

Route::get('/tours', [TourController::class, 'index']);
Route::get('/tours/create', [TourController::class, 'create']);
Route::post('/tours', [TourController::class, 'store']);
Route::get('/tours/{id}/edit', [TourController::class, 'edit']);
Route::put('/tours/{id}', [TourController::class, 'update']);
Route::get('/tours/{id}/delete', [TourController::class, 'delete']);

Route::get('/banners', [BannerController::class, 'index']);
Route::get('/banners/create', [BannerController::class, 'create']);
Route::post('/banners', [BannerController::class, 'store']);
Route::put('/banners/{id}', [BannerController::class, 'update']);
Route::delete('/banners/{id}', [BannerController::class, 'delete']);

Route::get('/logos', [LogoController::class, 'index']);
Route::get('/logos/create', [LogoController::class, 'create']);
Route::post('/logos', [LogoController::class, 'store']);
Route::put('/logos/{id}', [LogoController::class, 'update']);
Route::delete('/logos/{id}', [LogoController::class, 'delete']);

Route::get('/footers', [FooterController::class, 'index']);
Route::get('/footers/create', [FooterController::class, 'create']);
Route::post('/footers', [FooterController::class, 'store']);
Route::put('/footers/{id}', [FooterController::class, 'update']);
Route::delete('/footers/{id}', [FooterController::class, 'destroy']);

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/create', [BlogController::class, 'create']);
Route::post('/blogs', [BlogController::class, 'store']);
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit']);
Route::delete('/blogs/{id}', [BlogController::class, 'destroy']);

// });

Route::post('/upload-image', [BlogController::class, 'uploadImage'])->name('upload-image');
