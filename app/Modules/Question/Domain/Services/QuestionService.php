<?php 

namespace App\Modules\Question\Domain\Services;

use App\Models\Question;
use App\Modules\Question\Domain\DTO\Mappers\QuestionDetailsMapper;
use App\Modules\Question\Domain\DTO\QuestionDto;
use App\Modules\Question\Domain\DTO\VoteDto;
use App\Modules\Question\Domain\Repositories\QuestionRepositoryInterface;
use Illuminate\Support\Facades\DB;

class QuestionService
{
    public function __construct(
        private QuestionRepositoryInterface $questions
    ) {}

    public function getDetails(int $id): QuestionDto
    {
        $question = $this->questions->findDetails($id);

        return QuestionDetailsMapper::fromModel($question);
    }

    
}


