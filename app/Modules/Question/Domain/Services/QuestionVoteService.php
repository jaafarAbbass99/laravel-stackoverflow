<?php 

namespace App\Modules\Question\Domain\Services;

use App\Modules\Question\Domain\Repositories\QuestionRepositoryInterface;
use App\Modules\Question\Domain\Guards\QuestionGuard;
use App\Modules\Question\Domain\Rules\UserCanVoteOnce;

class QuestionVoteService
{
    public function __construct(
        private QuestionRepositoryInterface $questionRepo
    ) {}

    public function upVote(int $questionId): void
    {

        QuestionGuard::withOpenQuestion($questionId , function($question){
            
            UserCanVoteOnce::check($question);

            // ✅ إنشاء التصويت
            $this->questionRepo->createVote($question);
            
            // ✅ زيادة العداد
            $question->increment('votes_count');
        });
    }


    public function downVote(int $questionId): void
    {

        QuestionGuard::withOpenQuestion($questionId , function($question){

            UserCanVoteOnce::check($question);
            
            // ✅ إنشاء التصويت
            $this->questionRepo->createVote($question);
            

            // ✅ انقاص العداد
            $question->decrement('votes_count');
        });
    }

}
