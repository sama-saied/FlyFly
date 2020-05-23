<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Cartt;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Darryldecode\Cart\Facades\CartFacade;
use Darryldecode\Cart\CartServiceProvider;
use Darryldecode\Cart\CartCondition;
use Illuminate\Support\Facades\Auth;

use Cart;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('site.partials.nav', function ($view) {
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
        });

        View::composer('site.partials.sidebar', function ($view) {
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
        });

        View::composer('site.partials.herosection', function ($view) {
            $view->with('categories', Category::orderByRaw('-name ASC')->get()->nest());
        });

        View::composer('site.partials.sidebar', function ($view) {
            $view->with('brands', Brand::orderByRaw('-name ASC')->get());
        });
    
       View::composer('site.partials.header', 
      
         function ($view) { 
            if(Auth::check()) 
            $view->with('carttCount', Cartt::Counter(auth()->user()->id));
            else 
            $view->with('cartCount', Cart::getContent()->count());
         });
    }
}