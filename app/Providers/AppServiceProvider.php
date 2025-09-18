<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Footer;
use App\Models\GoogleMap;
use App\Models\Logo;
use App\Models\Order;
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
        $footer = Footer::first();
        $googleMap = GoogleMap::where('status', 'active')->first();
        View::share('footer', $footer);
        View::share('countOrder', $countOrder);
        View::share('googleMap', $googleMap);
        // Share categories for navigation
        try {
            $categoriesNav = Category::with('categoryChild')
                ->where('is_nav', true)
                ->orderByRaw('CASE WHEN `order` IS NOT NULL THEN `order` ELSE 999 END ASC')
                ->orderBy('created_at', 'desc')
                ->take(8)
                ->get();
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
