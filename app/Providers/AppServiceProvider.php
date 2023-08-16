<?php

namespace App\Providers;

use App\Models\User;
use App\Models\WebsiteSettings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        View::composer('*', function ($view) {
            $user = null;
            if (Auth::check()) {
                $id = Auth::user()->id;
                $user = User::find($id);
            }
            $view->with('user', $user);
        });

        View::composer('*', function ($view) {
            $settings = WebsiteSettings::where('setting_status', 'Active')->get();
            $view->with('settings', $settings);
        });
    }
}
