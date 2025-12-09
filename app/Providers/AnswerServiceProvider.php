<?php

namespace App\Providers;

use App\Modules\Answer\Domain\Repositories\AnswerRepositoriesInterface;
use App\Modules\Answer\Infrastructure\Repositories\EloquentAnswerRepositories;
use Illuminate\Support\ServiceProvider;

class AnswerServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        $this->app->bind(
            AnswerRepositoriesInterface::class,
            EloquentAnswerRepositories::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
