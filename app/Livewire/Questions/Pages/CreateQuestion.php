<?php

namespace App\Livewire\Questions\Pages;

use App\Models\Question;
use App\Services\QuestionService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.plain')]
class CreateQuestion extends Component
{
    #[Validate('required|min:10')]
    public $title;
    #[Validate('required|min:10')]
    public $description;
    #[Validate('required|array|min:1|max:5')]
    public $tags = [];


    protected $listeners = ['tagsUpdated' => 'updateTags'];

    public function updateTags($tags)
    {
        $this->tags = $tags;
    }
    
    public function save()
    {
        $this->validate();

        $question = Question::create([
            'title' => $this->title,
            'description' => $this->description,
            'user_id' => auth('web')->id(),
        ]);

        $question->tags()->attach(collect($this->tags)->pluck('id'));
        return redirect()->route('question.show',$question);
    }

    public function saveTo(QuestionService $service)
    {
        $validated = $this->validate();
    
        $question = $service->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);
    
        $question->tags()->attach(collect($this->tags)->pluck('id'));
        // $question->tags()->sync($validated['tags']);

        session()->flash('success', 'Question created successfully!');

        return redirect()->route('question.show',$question);
    }

    
    public function render()
    {
        return view('livewire.questions.pages.create-question');
    }
}
