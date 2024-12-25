<?php

// namespace incipient\structura\Providers;
namespace OrganizationalChart\Providers;


use Illuminate\Support\ServiceProvider;

class OrganizationalChartServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot()
    {
        // Publish migrations
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');

        // Load views
        $this->loadViewsFrom(__DIR__ . '/../Views', 'organizationalchart');

        // Load routes
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');

        // Publish configuration
        $this->publishes([
            __DIR__ . '/../Config/organizational_chart.php' => config_path('organizational_chart.php'),
        ], 'config');
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