<?php

namespace DraperStudio\Forms;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'forms';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishConfig()
             ->publishViews()
             ->loadViews()
             ->mergeConfig('forms');
    }

    public function register()
    {
        //
    }
}
