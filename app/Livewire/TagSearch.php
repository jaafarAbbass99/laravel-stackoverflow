<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TagSearch extends Component
{

    public $query ='';
    public $suggestions = [];
    public $selectedTags = [];

    public function updatedQuery(){

        if(strlen(trim($this->query)) > 0){
            $this->suggestions = Tag::where('name' , 'like' , "%{$this->query}%")
            ->take(6)
            ->get()
            ->toArray();
        }else {
            $this->reset('suggestions');
        }
    }

    public function selectTag($tagId){

        $tag = collect($this->suggestions)->firstWhere('id', $tagId);
        if ($tag && !collect($this->selectedTags)->contains('id', $tagId)) {
            $this->selectedTags[] = $tag;
            $this->dispatch('tagsUpdated', $this->selectedTags); // للأب
        }

        $this->reset('query', 'suggestions');
    }

    public function removeTag($tagId)
    {
        $this->selectedTags = collect($this->selectedTags)
            ->reject(fn($tag) => $tag['id'] === $tagId)
            ->values()
            ->toArray();
        $this->dispatch('tagsUpdated', $this->selectedTags); // للأب
    }

    public function render()
    {
        return view('livewire.tag-search');
    }
}
