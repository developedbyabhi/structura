<?php

namespace incipient\structura\Providers;

use Illuminate\Support\ServiceProvider;

class OrganizationalChartServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Load migrations
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../Views', 'organizationalchart');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        // Publish configuration
        $this->publishes([
            __DIR__ . '/../Config/organizational_chart.php' => config_path('organizational_chart.php'),
        ], 'config');

        // Publish migrations
        $this->publishes([
            __DIR__ . '/../Migrations' => database_path('migrations'),
        ], 'migrations');

        // Publish views
        $this->publishes([
            __DIR__ . '/../Views' => resource_path('views/vendor/organizationalchart'),
        ], 'views');

        // Publish controllers
        $this->publishes([
            __DIR__ . '/../Controllers' => app_path('Http/Controllers/Vendor/Structura'),
        ], 'controllers');
    }

    /**
     * Register services.
     */
    public function register()
    {
        // Merge configuration
        $this->mergeConfigFrom(__DIR__ . '/../Config/organizational_chart.php', 'organizational_chart');
    }
}
