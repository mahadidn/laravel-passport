<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

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
        Passport::loadKeysFrom(__DIR__ . '/../secrets/oauth');

        Passport::tokensCan([
            'get-email' => 'Retrieve the email associated with your account',
            'create-posts' => 'Create posts on behalf of your user',
        ]);

    }
}
