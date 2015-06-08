<?php

namespace DraperStudio\Forms;

use Illuminate\Support\ServiceProvider;

class FormsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'forms');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/forms'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../config/forms.php' => config_path('forms.php'),
        ], 'config');
    }

    /**
     * Register bindings in the container.
     */
    public function register()
    {
        //
    }
}
