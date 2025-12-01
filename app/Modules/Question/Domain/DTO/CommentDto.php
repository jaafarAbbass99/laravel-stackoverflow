<?php


namespace App\Modules\Question\Domain\DTO;

use DateTime;

class CommentDto
{
    public function __construct(
        public int $id,
        public string $commentText,
        public DateTime $createdAt,
        public DateTime $updatedAt,
        public int $commentableId,
        public string $author,
        public int $authorId,
    ) {}
}