<?php 

namespace App\Modules\Question\Infrastructure\Repositories;

use App\Models\Question;
use App\Models\Vote;

use App\Modules\Question\Domain\Repositories\QuestionRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use QuestionDetailsMapper;

class EloquentQuestionRepository implements QuestionRepositoryInterface
{
    public function findById(int $id): Question
    {
        return Question::where('id',$id)->lockForUpdate()->firstOrFail();
    }
    
    public function findDetails(int $id): Question
    {
        return Question::with([
            'user:id,name',
            'myVote',
            'tags'  => fn($t) => $t->withCount('questions'),
        ])->findOrFail($id);

    }

    public function getMyVote(Question $question){
        return $question->myVote()->first();
    }

    public function createVote(Question $question):Vote
    {
        return $question->votes()->create([
                'voted_by'  => Auth::id(),
                'vote_type' => 1,
            ]);
    }

    public function updateVote(int $questionId,int $votesCount):bool
    {
        return Question::where('id',$questionId)->update(['votes_count'=>$votesCount]);
    }

    public function setAcceptedAnswer(int $questionId , int $answerId){
        Question::where('id',$questionId)
                ->update(['accepted_answer_id' => $answerId]);
    }


}
