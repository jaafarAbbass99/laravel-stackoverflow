<?php 

namespace App\Modules\Answer\Domain\Services;

use App\Modules\Answer\Domain\DTO\AnswerDto;
use App\Modules\Answer\Domain\DTO\Mapper\AnswerDetailsMapper;
use App\Modules\Answer\Domain\Repositories\AnswerRepositoriesInterface;

class AnswerService {

    public function __construct(
        private AnswerRepositoriesInterface $answerRepo
    )
    {}


    public function getAnswersWithDetails(int $questionId)
    {
        $answers = $this->answerRepo->getAnswersDetailsForQuestion($questionId);

        return $answers->map(
            fn ($answer) => AnswerDetailsMapper::fromModel($answer)
        )->toArray();

    }

    public function increaseAnswerForQuestion(int $questionId , int $NewcountAnswers)
    {
        $this->answerRepo->updateCountAnswerForQuestion($questionId , $NewcountAnswers);
    }
    

}