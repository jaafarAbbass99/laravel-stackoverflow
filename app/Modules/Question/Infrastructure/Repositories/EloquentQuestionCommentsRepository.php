<?php 

namespace App\Modules\Question\Infrastructure\Repositories;

use App\Models\Comment;
use App\Models\Question;
use App\Modules\Question\Domain\Repositories\QuestionCommentsRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class EloquentQuestionCommentsRepository implements QuestionCommentsRepositoryInterface
{
    public function getCommentsWithPaginated(int $questionId, int $perPage = 2){
        return Comment::with('user:id,name')
            ->where('commentable_id', $questionId)
            ->where('commentable_type', Question::class)
            ->orderBy('id', 'DESC')
            ->paginate($perPage);
    } 

    public function createComment(int $questionId ,int $userId, string $text):Comment
    {       
        return Comment::query()
            ->create([
                'comment_text'    => $text,
                'added_by'        => $userId,
                'commentable_id'  => $questionId,
                'commentable_type'=> Question::class,
        ]);

    }

    public function updateComment(int $commentId,int $userId,string $newText):bool
    {
        return Comment::where('id', $commentId)
            ->where('added_by', $userId)
            ->update(['comment_text' => $newText]);
    }
    
    public function deleteComment(int $commentId,int $userId):bool
    {
        return Comment::where('id', $commentId)
        ->where('added_by', $userId)
        ->delete();
    }

    
}
