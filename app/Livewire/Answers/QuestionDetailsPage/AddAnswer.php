<?php

namespace App\Livewire\Answers\QuestionDetailsPage;

use App\Modules\Answer\Domain\DTO\CreateAnswerDto;
use App\Modules\Answer\Domain\Services\AnswerService;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddAnswer extends Component
{
    
    private AnswerService $answerService;

    public int $questionId ;

    #[Validate('required|min:15')]
    public string $description = '' ;

    public function mount(int $questionId)
    {
        $this->questionId = $questionId;
    }

    public function boot(AnswerService $answerService )
    {
        $this->answerService = $answerService ;
    }
    
    public function createAnswer(){
        
        $this->validate();

        if (!auth('web')->check()) {
            return redirect()->route('login');
        }
        
        try{
            
            $this->answerService->createAnswer(
                CreateAnswerDto::fromArray([
                    'description' => $this->description,
                    'questionId'=>$this->questionId,
                ])
            );

            $this->reset('description');
            
            // Events
            $this->dispatch('answer-added');
            $this->dispatch('toast-success', message: 'Your answer has been posted successfully.' );

        }catch(\Exception $e){

            $this->dispatch('toast-error', message: $e->getMessage());

            $this->reset('description');

        }

    }

    public function render()
    {
        return view('livewire.answers.questionDetailsPage.add-answer');
    }
}
