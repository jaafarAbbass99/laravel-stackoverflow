<?php 

namespace App\Modules\Answer\Domain\DTO;

use App\Models\Vote;
use Livewire\Wireable;
use DateTime;

class VoteDtoWireable implements Wireable
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

    public function toLivewire()
    {
        return [
            'id'        => $this->id,
            'voteType'  => $this->voteType,
            'votedBy'   => $this->votedBy,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->createdAt
        ];
    }

    public static function fromLivewire($value)
    {
        return new self(
            id:        $value['id'],
            voteType:  $value['voteType'],
            votedBy:   $value['votedBy'],
            createdAt: $value['createdAt'],
            updatedAt: $value['updatedAt'],
        );
    }

}