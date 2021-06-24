<?php

namespace App\Providers;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Builder::macro('search', function($field, $string){
            return $string ? $this->where($field, 'like', '%'. $string. '%') : $this;
        });
        // URL::forceRootUrl(Config::get('app.url'));
        // if (Str::contains(Config::get('app.url'), 'https://')) {
        //     URL::forceScheme('https');
        // }
    }
}
