<?php 

namespace App\Modules\Answer\Domain\Services;

use App\Models\Question;
use App\Modules\Answer\Domain\DTO\AnswerDto;
use App\Modules\Answer\Domain\DTO\CreateAnswerDto;
use App\Modules\Answer\Domain\DTO\Mapper\AnswerDetailsMapper;
use App\Modules\Answer\Domain\Repositories\AnswerRepositoriesInterface;
use DomainException;
use Illuminate\Support\Facades\Gate;

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

    public function createAnswer(CreateAnswerDto $dto)
    {
        $question = Question::findOrFail($dto->questionId);
        Gate::authorize('createAnswer', $question);

        return $this->answerRepo->createAnswerForQuestion(
            $dto->questionId,
            $dto->description
        );
    }

    public function increaseAnswerForQuestion(int $questionId , int $NewcountAnswers)
    {
        $this->answerRepo->updateCountAnswerForQuestion($questionId , $NewcountAnswers);
    }
    

}