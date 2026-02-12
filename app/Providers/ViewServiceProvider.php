<?php

namespace App\Providers;

use App\Http\Controllers\FooterController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer(['frontend.layouts.footer'], function ($view) {
            $footerController = new FooterController();
            $footerData = $footerController->getFooterData();
            $view->with('footerData', $footerData);
        });
    }
}
