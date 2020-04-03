<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    $this->app->singleton(
      \App\Repositories\User\UserRepositoryInterface::class,
      \App\Repositories\User\UserRepository::class
    );
    $this->app->singleton(
      \App\Repositories\Department\DepartmentRepositoryInterface::class,
      \App\Repositories\Department\DepartmentRepository::class
    );
    $this->app->singleton(
      \App\Repositories\Project\ProjectRepositoryInterface::class,
      \App\Repositories\Project\ProjectRepository::class
    );
    $this->app->singleton(
      \App\Repositories\Task\TaskRepositoryInterface::class,
      \App\Repositories\Task\TaskRepository::class
    );
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    Schema::defaultStringLength(191);
  }
}
