<?php 

namespace App\Modules\Answer\Domain\DTO;

use DateTime;
use Livewire\Wireable;

final class AnswerDto implements Wireable
{
    
    public function __construct(
        public int $id ,
        public string $description ,
        public int $votesCount ,
        public string $status,
        public bool $isAccepted,
        public DateTime $createdAt,
        public DateTime $updatedAt,
        public int $questionId ,
        public UserDtoWireable $author , 
        public array $comments ,
        public ?VoteDtoWireable $myVote
    )
    {}

    public function toLivewire()
    {
        return [
            'id'          => $this->id,
            'description' => $this->description,
            'votesCount'  => $this->votesCount,
            'status'      => $this->status,
            'isAccepted'  => $this->isAccepted,

            'createdAt'   => $this->createdAt,
            'updatedAt'   => $this->updatedAt,

            'questionId'  => $this->questionId,

            // نستخدم toLivewire الخاصة بـ UserDto
            'author'      => $this->author->toLivewire(),

            'comments' => array_map(fn(CommentsDtoWireable $c) => $c->toLivewire(), $this->comments),
            // comments array يعتبر primitive = Livewire يقبله بدون مشاكل

            // myVote قد يكون null
            'myVote'      => $this->myVote?->toLivewire(),
        ];
    }

    public static function fromLivewire($value)
    {
        return new self(
            id:          $value['id'],
            description: $value['description'],
            votesCount:  $value['votesCount'],
            status:      $value['status'],
            isAccepted:  $value['isAccepted'],

            // نعيد بناء التاريخ
            createdAt:   $value['createdAt'],
            updatedAt:   $value['updatedAt'],

            questionId:  $value['questionId'],

            // نعيد بناء author DTO
            author: UserDtoWireable::fromLivewire($value['author']),
            
            comments: array_map(fn($c) => CommentsDtoWireable::fromLivewire($c), $value['comments']),
            // nullable
            myVote:      $value['myVote'] ? VoteDtoWireable::fromLivewire($value['myVote']) : null
        );
    } 
}