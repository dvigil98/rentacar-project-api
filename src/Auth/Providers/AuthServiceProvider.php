<?php

namespace Src\Auth\Providers;

use Illuminate\Support\ServiceProvider;

// Repositories
use Src\Auth\Interfaces\IAuthRepository;
use Src\Auth\Repositories\AuthRepository;

// Services
use Src\Auth\Interfaces\IAuthService;
use Src\Auth\Services\AuthService;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Repositories
        $this->app->bind(IAuthRepository::class, AuthRepository::class);

        // Services
        $this->app->bind(IAuthService::class, AuthService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes.php');
    }
}
