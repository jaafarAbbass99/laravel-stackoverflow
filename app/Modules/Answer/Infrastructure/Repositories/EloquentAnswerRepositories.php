<?php 

namespace App\Modules\Answer\Infrastructure\Repositories;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Vote;
use App\Modules\Answer\Domain\Repositories\AnswerRepositoriesInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EloquentAnswerRepositories implements AnswerRepositoriesInterface
{
    public function getAnswersDetailsForQuestion(int $questionId)
    {
        return Answer::where('question_id' , $questionId)
            ->with([
                'comments.user:id,name',
                'user',
                'myVote',
            ])->get();
    }

    public function createAnswerForQuestion(int $questionId , string $description):Answer
    { 
        return Answer::create([
            'description'=>$description,
            'user_id'=> Auth::id(),
            'question_id'=> $questionId
        ]);
    }
    
    public function updateCountAnswerForQuestion(int $questionId , int $NewcountAnswer):bool
    {
        return Question::whereId($questionId)->update(['answers_count' , $NewcountAnswer]);
    }

    public function createVote(int $answerId,int $voteUpDown){
        return Vote::create([
            'votable_id' => $answerId ,
            'votable_type'=>Answer::class,
            'voted_by'  => Auth::id(),
            'vote_type' => $voteUpDown,
        ]);
    }

    public function incrementVote(int $answerId){
        return Answer::where('id',$answerId)->increment('votes_count');
    }

    public function decrementVote(int $answerId){
        return Answer::where('id',$answerId)->decrement('votes_count');
    }

    public function markAsAccepted(int $answerId){
        Answer::where('id',$answerId)
            ->update(['is_accepted'=>true]);
    }



    
}