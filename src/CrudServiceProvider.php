<?php

namespace Zahidhemon\OnePunchCrud;

use Illuminate\Support\ServiceProvider;
use Zahidhemon\OnePunchCrud\Commands\MakeCrud;

class CrudServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadViewsFrom(__DIR__.'/resources/stubs', 'crudpunch');

        $this->publishes([
            __DIR__.'/resources/stubs' => resource_path('vendor/zahidhemon/stubs'),
        ]);
    }
    
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            MakeCrud::class,
        ]);

        // $this->loadViewsFrom(__DIR__ . '/resources/views', 'crudpunch');
    }
}
