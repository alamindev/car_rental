<?php

namespace App\Providers;

use App\About;
use App\Contact;
use App\LogoTitle;
use App\Services;
use App\Social;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer(['website.includes.header', 'website.includes.footer'], function ($view) {
            $logo = LogoTitle::where('deleted_at', null)->first();
            $contact = Contact::first();
            $social = Social::first();
            // for footer
            $about = About::first();
            $services = Services::where('deleted_at', null)->orderBy('id', 'DESC')->limit(6)->get();
            $copy = DB::table('copyrights')->first();
            $view->with('logo', $logo)
                ->with('contact', $contact)
                ->with('social', $social)
                ->with('copy', $copy)
                ->with('services', $services)
                ->with('about', $about);
        });
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
