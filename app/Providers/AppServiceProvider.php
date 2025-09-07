<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $address = Account::first();
        View::share('address', $address);
        
        // Share categories for navigation
        try {
            $categoriesNav = Category::with('categoryChild')->get();
            View::share('categoriesNav', $categoriesNav);
        } catch (\Exception $e) {
            // Fallback if table doesn't exist or has issues
            View::share('categoriesNav', collect());
        }
    }
}
