<?php

namespace App\Providers;

use App\Modules\Question\Domain\Repositories\QuestionCommentsRepositoryInterface;
use Livewire\Livewire;
use App\Modules\Question\Domain\Repositories\QuestionRepositoryInterface;
use App\Modules\Question\Infrastructure\Repositories\EloquentQuestionCommentsRepository;
use App\Modules\Question\Infrastructure\Repositories\EloquentQuestionRepository;
use App\Modules\Question\UI\Livewire\components\CommentsSection;
use App\Modules\Question\UI\Livewire\components\QuestionVote;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class QuestionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            QuestionRepositoryInterface::class,
            EloquentQuestionRepository::class
        );
        $this->app->bind(
            QuestionCommentsRepositoryInterface::class,
            EloquentQuestionCommentsRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
    }
}
