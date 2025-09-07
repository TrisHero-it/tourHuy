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
Route::get('/{categorySlug}/{slug}', function($categorySlug, $slug) {
    // Check if slug is a tour slug
    $tour = \App\Models\Tour::where('slug', $slug)->first();
    
    if ($tour) {
        // Show tour detail
        return app(TourController::class)->show($categorySlug, $slug);
    } else {
        // Show tours by category child
        return app(CategoryController::class)->toursByCategoryChild($categorySlug, $slug);
    }
})->name('tour.or.category-child');