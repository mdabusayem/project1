<?php

namespace App\Providers;
use App\Repositories\Todo\TodoRepositoryInterface;
use App\Repositories\Todo\TodoRepository;

use Illuminate\Support\ServiceProvider;

class TodoProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(TodoRepositoryInterface::class, TodoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
