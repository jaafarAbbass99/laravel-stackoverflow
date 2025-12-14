<?php 

namespace App\Modules\Answer\Domain\DTO ;

class CreateAnswerDto 
{
    public function __construct(
        public readonly string $description,
        public readonly int $questionId,
    ) {}
    
    public static function fromArray(array $array):self 
    {
        return new self(
            description : $array['description'], 
            questionId : $array['questionId'],
        );
    }

}