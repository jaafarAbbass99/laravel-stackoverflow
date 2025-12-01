<?php 

namespace App\Modules\Question\Domain\Rules;

use App\Models\Question;
use DomainException;

class UserCanVoteOnce {

    public static function check(Question $question) :void
    {
        $voteExists = $question->myVote()->lockForUpdate()->first();
        
        if($voteExists){
            throw new DomainException("You last voted on this question {$voteExists->created_at->diffForHumans()}. Your vote is now locked in unless this question is edited.");
        }
    }
}