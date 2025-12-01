<?php 

namespace App\Modules\Question\Domain\DTO;

use App\Models\Vote;
use DateTime;

final class VoteDto
{
    public function __construct(
        public int $id,
        public int $voteType,
        public int $votedBy,
        public  $createdAt,
        public DateTime $updatedAt,
    ) {}

    public static function fromModel(Vote $vote): self
    {
        return new self(
            id: $vote->id,
            voteType: $vote->vote_type,
            votedBy: $vote->voted_by,
            createdAt: $vote->created_at,
            updatedAt: $vote->updated_at,
        );
    }
}

