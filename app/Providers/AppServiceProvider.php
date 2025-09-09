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

        $countOrder = Order::where('status', 'Chưa liên hệ')->count();
        $address = Account::first();
        View::share('address', $address);
        View::share('countOrder', $countOrder);

        // Share categories for navigation
        try {
            $categoriesNav = Category::with('categoryChild')->get();
            View::share('categoriesNav', $categoriesNav);
        } catch (\Exception $e) {
            // Fallback if table doesn't exist or has issues
            View::share('categoriesNav', collect());
        }

        // Share active logo globally
        try {
            $logo = Logo::where('status', 'active')->first();
            View::share('logo', $logo);
        } catch (\Exception $e) {
            // Fallback if table doesn't exist or has issues
            View::share('logo', null);
        }
    }
}
