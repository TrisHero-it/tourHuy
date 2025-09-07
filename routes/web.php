<?php

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CategoryController;
use App\Http\Controllers\Client\TourController;
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

// Home page
Route::get('/', [HomeController::class, 'index']);

// Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/{slug}', [CategoryController::class, 'show'])->name('category.show');

// Tours and Category Children
Route::get('/{categorySlug}/{slug}', [CategoryController::class, 'toursByCategoryChild'])
    ->name('category.child.show');

// Tour detail with category child
Route::get('/{categorySlug}/{categoryChildSlug}/{tourSlug}', [TourController::class, 'showWithCategoryChild'])
    ->name('tour.detail');