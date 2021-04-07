<?php

namespace maksymKalashnyk\Backup;

use maksymKalashnyk\Backup\Command\Backup;
use Illuminate\Support\ServiceProvider;

class BackupServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
        $this->builder = new Builder();
        
        $this->app->singleton('db.backup', function ($app) {
            return new Backup($this->builder);
        });
        
        $this->commands(
            'db.backup'
        );
    }

    public function provides()
    {
        return [
            'db.backup'
        ];
    }
}
