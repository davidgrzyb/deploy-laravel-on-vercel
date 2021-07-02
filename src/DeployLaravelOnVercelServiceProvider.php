<?php

namespace DavidGrzyb\DeployLaravelOnVercel;

use Illuminate\Support\ServiceProvider;
use DavidGrzyb\DeployLaravelOnVercel\Console\InstallPackageCommand;

class DeployLaravelOnVercelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallPackageCommand::class,
            ]);

            $this->publishes([
                __DIR__.'/../assets/api/index.php' => base_path('api/index.php'),
                __DIR__.'/../assets/.vercelignore' => base_path('.vercelignore'),
            ], 'assets');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        
    }
}
