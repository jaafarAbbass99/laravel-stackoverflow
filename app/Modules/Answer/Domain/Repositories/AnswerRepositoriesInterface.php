<?php 

namespace App\Modules\Answer\Domain\Repositories;

use App\Models\Answer;
use App\Models\Question;

interface AnswerRepositoriesInterface {

    public function getAnswersDetailsForQuestion(int $questionId) ;
    public function updateCountAnswerForQuestion(int $questionId , int $NewcountAnswer):bool ;
    public function createVote(int $answerId,int $voteUpDown);
    public function incrementVote(int $answerId);
    public function decrementVote(int $answerId);
    public function markAsAccepted(int $answerId);

    
}