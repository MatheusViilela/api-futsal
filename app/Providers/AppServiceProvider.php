<?php

namespace App\Providers;

use App\Models\Matches;
use App\Models\Teams;
use App\Observers\MatchesObserver;
use App\Observers\TeamsObserver;
use Illuminate\Support\Facades\Schema;
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
        Teams::observe((TeamsObserver::class));
        Matches::observe(MatchesObserver::class);

        Schema::defaultStringLength(191);
    }
}
