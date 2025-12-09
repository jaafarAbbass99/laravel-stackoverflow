<?php 

namespace App\Modules\Question\Domain\Repositories;

use App\Models\Question;

interface QuestionRepositoryInterface
{
    public function findById(int $id): Question;
    public function findDetails(int $id): Question;
    public function getMyVote(Question $question);
    public function createVote(Question $question);
    public function updateVote(int $questionId,int $votesCount);
    public function setAcceptedAnswer(int $questionId , int $answerId);
}
