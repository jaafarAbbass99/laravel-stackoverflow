<?php

use App\Http\Controllers\QuestionController;
use App\Livewire\Questions\Pages\CreateQuestion;
use App\Livewire\Questions\Pages\QuestionDetailsPage;
use Illuminate\Support\Facades\Route;



Route::get('/questions/create', CreateQuestion::class)
    ->middleware(['auth'])
    ->name('questions.create');

Route::get('/questions/{id}',QuestionDetailsPage::class)
    ->name('question.show');



    