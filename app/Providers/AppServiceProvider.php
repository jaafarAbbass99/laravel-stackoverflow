<?php

namespace App\Providers;

use App\Modules\Question\Domain\Repositories\QuestionRepositoryInterface;
use App\Modules\Question\Infrastructure\Repositories\EloquentQuestionRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
