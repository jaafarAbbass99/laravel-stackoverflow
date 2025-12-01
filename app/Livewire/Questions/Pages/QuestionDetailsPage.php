<?php

namespace App\Livewire\Questions\Pages;

use App\Modules\Question\Domain\DTO\QuestionDto;
use App\Modules\Question\Domain\Services\QuestionService;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('components.layouts.myapp')]
class QuestionDetailsPage extends Component
{
    private QuestionDto $question;

    public function mount(int $id, QuestionService $service)
    {
        $this->question = $service->getDetails($id);
    }

    public function render()
    {
        return view('livewire.questions.pages.question-details', [
            'question' => $this->question
        ]);
    }
}
