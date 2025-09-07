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

Route::get('/', [HomeController::class, 'index']);

Route::get('/test', function () {   
    return view('client.layout.app');
});

Route::get('/test-category', function () {
    $categories = \App\Models\Category::with('categoryChild')->get();
    $result = [];
    
    foreach ($categories as $category) {
        $result[] = [
            'name' => $category->name,
            'slug' => $category->slug,
            'children_count' => $category->categoryChild->count(),
            'children' => $category->categoryChild->pluck('name', 'slug')->toArray()
        ];
    }
    
    return response()->json($result);
});

// Category routes
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/{categorySlug}/{categoryChildSlug}', [CategoryController::class, 'toursByCategoryChild'])->name('tours.category-child');
Route::get('/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/{categorySlug}/{childSlug}', [CategoryController::class, 'showChild'])->name('category.child.show');

// Tour routes
Route::get('/{categorySlug}/{tourSlug}/detail', [TourController::class, 'show'])->name('tour.detail');
