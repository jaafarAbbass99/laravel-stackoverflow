<?php 

namespace App\Modules\Answer\Domain\Services;

use App\Enums\VoteTypes;
use App\Modules\Answer\Domain\Repositories\AnswerRepositoriesInterface;
use App\Modules\Answer\Domain\Rules\UserCanVoteOnce;
use App\Modules\Question\Domain\Guards\QuestionGuard;
use App\Modules\Question\Domain\Repositories\QuestionRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AnswerVoteService 
{
    public function __construct(
        private AnswerRepositoriesInterface $answerRepo,
        private QuestionRepositoryInterface $questionRepo
    ) {}

    public function upVote(int $questionId,int $answerId): void
    {
        QuestionGuard::withOpenQuestion($questionId , function($question) use($answerId){
            
            UserCanVoteOnce::check($answerId);

            // ✅ إنشاء التصويت
            $this->answerRepo->createVote($answerId, VoteTypes::UPVOTE );
            
            // ✅ زيادة العداد
            $this->answerRepo->incrementVote($answerId);
        });
    }

    public function downVote(int $questionId ,int $answerId): void
    {

        QuestionGuard::withOpenQuestion($questionId , function($question) use($answerId){

            UserCanVoteOnce::check($answerId);
            
            // ✅ إنشاء التصويت
            $this->answerRepo->createVote($answerId , VoteTypes::DOWNVOTE );
            
            // ✅ انقاص العداد
            $this->answerRepo->decrementVote($answerId);
        });
    }

    public function acceptAnswer(int $questionId,int $answerId)
    {
        DB::transaction(function () use ($questionId,$answerId) {
            $this->answerRepo->markAsAccepted($answerId);
            $this->questionRepo->setAcceptedAnswer($questionId, $answerId);
        });
    }
}