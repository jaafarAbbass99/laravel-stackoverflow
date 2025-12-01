<?php

namespace App\Modules\Question\Domain\DTO\Mappers;


use App\Models\Comment;
use App\Modules\Question\Domain\DTO\CommentDto;

class CreateCommentMapper
{
    public static function fromModel(Comment $comment,int $authorId ,string $author ): CommentDto
    {
        return new CommentDto(
            id: $comment->id,
            commentText: $comment->comment_text,
            createdAt: $comment->created_at,
            updatedAt: $comment->updated_at,
            commentableId: $comment->commentable_id,
            author: $author,
            authorId: $authorId,
        );
    }
}
