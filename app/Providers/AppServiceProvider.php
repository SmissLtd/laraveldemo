<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use App\Brand;
use App\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!\App::runningInConsole() || \App::runningUnitTests())
        {
            View::share('footerCategories', Category::where('is_special', false)->take(5)->get());
            View::share('footerFeatureCategories', Category::where('is_special', true)->take(5)->get());
            View::share('footerBrands', Brand::take(5)->get());
            View::share('configPhoneShort', Config::getValue('phone_short'));
            View::share('configPhoneFull', Config::getValue('phone_full'));
            View::share('configAddress', Config::getValue('address'));
            View::share('configEmail', Config::getValue('email'));
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
