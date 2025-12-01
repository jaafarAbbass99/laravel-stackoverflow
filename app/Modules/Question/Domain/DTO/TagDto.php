<?php 

namespace App\Modules\Question\Domain\DTO;

use App\Models\Tag;

final class TagDto
{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
        public int $questionsCount,
    ) {}

    public static function fromModel(Tag $tag): self
    {
        return new self(
            id: $tag->id,
            name: $tag->name,
            description: $tag->description,
            questionsCount: $tag->questions_count,
        );
    }
}
