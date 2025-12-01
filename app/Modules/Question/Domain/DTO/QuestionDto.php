<?php 

namespace App\Modules\Question\Domain\DTO;

use DateTime;

final class QuestionDto
{
    public function __construct(
        public int $id,
        public string $title,
        public string $description,
        public DateTime $createdAt,
        public ?DateTime $updatedAt,
        public int $viewsCount,
        public int $answersCount,
        public int $votesCount,
        public string $status,
        public ?int $acceptedAnswerId,

        public UserDto $user,
        public $tags,
        public ?VoteDto $myVote
    ) {}
}