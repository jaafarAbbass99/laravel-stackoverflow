<?php 

namespace App\Modules\Answer\Domain\Rules;

use App\Models\Answer;
use App\Models\Vote;
use DomainException;
use Illuminate\Support\Facades\Auth;

class UserCanVoteOnce {

    public static function check(int $answerId) :void
    {
        $voteExists = Vote::where('votable_id', $answerId)
            ->where('votable_type',Answer::class)
            ->where('voted_by', Auth::id())
            ->lockForUpdate()
            ->first();
        if($voteExists){
            throw new DomainException("You last voted on this answer {$voteExists->created_at->diffForHumans()}. Your vote is now locked in unless this answer is edited.");
        }
    }
}