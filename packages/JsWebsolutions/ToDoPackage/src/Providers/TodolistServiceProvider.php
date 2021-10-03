<?php

namespace JsWebsolutions\ToDoPackage\Providers;
use JsWebsolutions\ToDoPackage\Contracts\TaskInterface;
use JsWebsolutions\ToDoPackage\Repository\TaskRepository;

use Illuminate\Support\ServiceProvider;

class TodolistServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //load controllers
        $this->app->make('JsWebsolutions\ToDoPackage\Controllers\TaskController');
        //load view of packages
        $this->loadViewsFrom(__DIR__.'/../Resources/views', 'ToDoPackage');

        // Register Interface and Repository in here
        // You must place Interface in first place
        // If you dont, the Repository will not get readed.
        $this->app->bind( TaskInterface::class,TaskRepository::class);
        //$this->app::bind('JsWebsolutions\\ToDoPackage\\Contracts\\TaskInterface', 'JsWebsolutions\\ToDoPackage\\Repository\\TaskRepository');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/todo_task.php' => config_path('todo_task.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../config/todo_task.php',
            'ToDoPackage'
        );

      

        //load routes file.
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
      

        //load migration of package.
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        

    }
}
