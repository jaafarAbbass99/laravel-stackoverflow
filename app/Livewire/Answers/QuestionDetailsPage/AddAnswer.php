<?php

namespace App\Livewire\Answers\QuestionDetailsPage;

use App\Models\Answer;
use App\Models\Question;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddAnswer extends Component
{
    public Question $question ;


    #[Validate('required|min:15')]
    public string $description = '' ;

    public function mount(Question $question)
    {
        $this->question = $question;
    }
    
    public function createAnswer(){
        $this->validate();
        try{
            $this->question->answers()->create([
                'description'=>$this->description,
                'user_id'=> auth('web')->id(),
            ]);
    
            $this->reset('description');
            $this->dispatch('answer-added');

            session()->flash('success', 'Your answer has been posted successfully.');
        }catch(\Exception $e){
            session()->flash('error', 'Something went wrong while posting your answer. Please try again.');
        }

    }

    public function render()
    {
        return view('livewire.add-answer');
    }
}
