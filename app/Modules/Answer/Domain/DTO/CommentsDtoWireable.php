<?php 

namespace App\Modules\Answer\Domain\DTO;

use DateTime;
use Livewire\Wireable;

class CommentsDtoWireable implements Wireable {

    public function __construct(
        public int $id,
        public string $commentText,
        public int $votesCount,
        public DateTime $createdAt,
        public DateTime $updatedAt,
        public int $commentableId,
        public string $author,
        public int $authorId,
    ) {}

    public function toLivewire()
    {
        return [
            'id' => $this->id,
            'commentText' => $this->commentText,
            'votesCount' => $this->votesCount,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
            'commentableId' => $this->commentableId,
            'author' => $this->author,
            'authorId' => $this->authorId,
        ];
    }

    public static function fromLivewire($value)
    {
        return new self(
            id: $value['id'],
            commentText: $value['commentText'],
            votesCount: $value['votesCount'],
            createdAt: $value['createdAt'],
            updatedAt: $value['updatedAt'],
            commentableId: $value['commentableId'],
            author: $value['author'],
            authorId: $value['authorId'],
        );
    }
    

}