<?php 

namespace App\Services;

use App\Http\Dto\Mappers\CommentMapper;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentService
{

    public function getPaginatedForQuestion(int $questionId, int $perPage = 2)
    {
        $comments = Comment::with('user:id,name')
            ->where('commentable_id', $questionId)
            ->where('commentable_type', \App\Models\Question::class)
            ->orderBy('id', 'DESC')
            ->paginate($perPage);

        // تحويل العناصر إلى DTOs
        $comments->setCollection(
            $comments->getCollection()->map(
                fn($comment) => CommentMapper::fromModel($comment)
            )
        );

        return $comments;
    }
    
    public function createForQuestion(int $questionId, string $text)
    {
        $comment = Comment::create([
            'comment_text' => $text,
            'added_by' => Auth::id(),
            'commentable_id' => $questionId,
            'commentable_type' => \App\Models\Question::class,
        ]);

        $comment->load('user:id,name');

        // تحويله إلى DTO
        return CommentMapper::fromModel($comment);
    }
}
