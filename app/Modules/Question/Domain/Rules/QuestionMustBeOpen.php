<?php 

namespace App\Modules\Question\Domain\Rules;

use App\Enums\QuestionStatus;
use App\Models\Question;
use DomainException;

class QuestionMustBeOpen
{
    public static function check(Question $question): void
    {
        if (self::validateStatusNot($question->status)) {
            throw new DomainException('This question is closed.');
        }
    }

    public static function validateStatusNot(string $status):bool
    {   
        return $status !== QuestionStatus::OPEN
            && $status !== QuestionStatus::REOPEN ;
    }
}
