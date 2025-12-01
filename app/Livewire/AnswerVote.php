<?php

namespace App\Livewire;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class AnswerVote extends Component
{
    public Answer $answer;
    public Question $question;

    public int $vote_type;
    public $vote ;
    public int $votes;
    public bool $accepted; 
    public bool $showCheck;

    protected $listeners = ['answerMarkedAsBest' => 'refreshCheck'];
    

    public function mount(Answer $answer , Question $question )
    {
        $this->answer = $answer;
        $this->votes = $answer->votes_count ;
        $this->accepted = $answer->is_accepted == 1 ? true :false ;
        $this->question = $question;

        // جلب صوت المستخدم الحالي 
        $this->vote = $this->answer->votes->first();  //$this->answer->votes()->where('voted_by', Auth::id())->first();
        $this->vote_type = $this->vote ? $this->vote->vote_type : 0 ;
    }


    public function upvote(){

        if (!auth('web')->check()) {
            return redirect()->route('login');
        }

        $vote = $this->answer->votes->first();
        if($vote){
            $this->dispatch('vote-error', message:"You last voted on this answer {$vote->created_at->diffForHumans()}. Your vote is now locked in unless this question is edited.");
            $this->dispatch('revert-upvote');
            return;
        }else{
            $vote = $this->answer->votes()->create([
                'voted_by'=>Auth::id(),
                'vote_type'=>1,
            ]);
            $this->answer->increment('votes_count');
        }
        // تحديث العدد الظاهر للواجهة
        $this->votes = $this->answer->votes_count;
        
    }

    public function downvote(){

        if (!auth('web')->check()) {
            return redirect();
        }

        $vote =  $this->answer->votes->first();

        if($vote){
            $this->dispatch('vote-error', message:"You last voted on this answer {$vote->created_at->diffForHumans()}. Your vote is now locked in unless this question is edited.");
            $this->dispatch('revert-downvote');
            return;
        }else{
            $vote = $this->answer->votes()->create([
                'voted_by'=>Auth::id(),
                'vote_type'=>-1,
            ]);
            $this->answer->decrement('votes_count');
        }
        // تحديث العدد الظاهر للواجهة
        $this->votes = $this->answer->votes_count;
        
    }

    public function makeAccepted(){

        if (!auth('web')->check()) {
            return redirect();
        }

        if(!auth('web')->id() == $this->question->user->id){
            $this->dispatch('vote-error', message:"not authorize");
            return;
        }

        if($this->showCheck){
            $this->dispatch('vote-error', message:"You cannot cancel the accepted vote");
            return;
        }


        $this->question->update(['accepted_answer_id' => $this->answer->id]);
        
        $this->answer->update(['is_accepted'=>'1']);

        $this->accepted = true ;

        // إرسال حدث إلى الأب
        $this->dispatch('answerMarkedAsBest');

    }


    public function refreshCheck()
    {
        $this->showCheck = true;
    }

    public function render()
    {
        return view('livewire.answer-vote');
    }
}

