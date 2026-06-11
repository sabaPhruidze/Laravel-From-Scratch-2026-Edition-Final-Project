<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
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
        Model::unguard(); //ხსნის დაცვას
        Model::shouldBeStrict(); // შეცდომაზე გვიგდებს exception_ს
        Model::automaticallyEagerLoadRelationships();// ავტომატურად ოპტიმიზაციას უკეთებს მონაცემების წამოღებას.
    }
}
