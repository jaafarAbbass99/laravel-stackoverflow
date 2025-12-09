<?php 

namespace App\Modules\Answer\Domain\DTO\Mapper;

use App\Models\Comment;
use App\Modules\Answer\Domain\DTO\CommentsDtoWireable;

final class CommentMapperWireable 
{
    public static function fromModel(Comment $comment){ 
        return new CommentsDtoWireable(
            id: $comment->id,
            commentText: $comment->comment_text,
            votesCount: $comment->votes_count,
            createdAt: $comment->created_at,
            updatedAt: $comment->updated_at,
            commentableId: $comment->commentable_id,
            author: $comment->user->name,
            authorId: $comment->user->id,
        );

    }
}