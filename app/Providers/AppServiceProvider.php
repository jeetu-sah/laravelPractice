<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Queue;
use ConsoleTVs\Charts\Registrar as Charts;

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
    public function boot(Charts $charts)
    {

        $charts->register([
            \App\Charts\SampleChart::class
        ]);
        
       Queue::after(function (JobProcessed $event) {
            $event->job;
        // $event->connectionName
            // $event->job
            // $event->job->payload()
        });
    }
}
