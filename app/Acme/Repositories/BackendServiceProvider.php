<?php namespace Acme\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'Acme\Repositories\ClientRepositoryInterface',
            'Acme\Repositories\DbClientRepository'
        );
        $this->app->bind(
            'Acme\Repositories\LeconRepositoryInterface',
            'Acme\Repositories\DbLeconRepository'
        );
        $this->app->bind(
            'Acme\Repositories\PaiementRepositoryInterface',
            'Acme\Repositories\DbPaiementRepository'
        );
    }
}