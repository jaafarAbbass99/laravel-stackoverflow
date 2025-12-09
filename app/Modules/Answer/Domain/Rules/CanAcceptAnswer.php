<?php 

namespace App\Modules\Answer\Domain\Rules;

use DomainException;

final class CanAcceptAnswer
{
    public static function check(bool $questionAnswered , bool $canAcceptAnswer): void
    {
        if ($questionAnswered) {
            throw new DomainException('Question already answered');
        }

        if (!$canAcceptAnswer) {
            throw new DomainException('Not authorized to accept answer.');
        }
    }
}   
