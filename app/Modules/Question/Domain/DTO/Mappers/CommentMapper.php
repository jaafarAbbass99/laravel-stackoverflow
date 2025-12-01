<?php

namespace App\Modules\Question\Domain\DTO\Mappers;


use App\Models\Comment;
use App\Modules\Question\Domain\DTO\CommentDto;

class CommentMapper
{
    public static function fromModel(Comment $comment): CommentDto
    {
        return new CommentDto(
            id: $comment->id,
            commentText: $comment->comment_text,
            createdAt: $comment->created_at,
            updatedAt: $comment->updated_at,
            commentableId: $comment->commentable_id,
            author: $comment->user->name ?? 'Unknown',
            authorId: $comment->added_by,
        );
    }
}
