<?php

namespace App\Providers;

use App\Services\QuotesGarden\QuotesService;
use Illuminate\Support\ServiceProvider;

class QuotesGardenProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind( QuotesService::class, function () {
            //Add config logic here
            return new QuotesService();
        } );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
