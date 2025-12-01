<?php 

namespace App\Modules\Question\Domain\Repositories;

use App\Models\Comment;
use App\Models\Question;

interface QuestionCommentsRepositoryInterface
{
    public function getCommentsWithPaginated(int $questionId, int $perPage = 2);
    public function createComment(int $questionId,int $userId,string $text):Comment;
    public function updateComment(int $commentId,int $userId,string $newText):bool;
    public function deleteComment(int $commentId,int $userId):bool;
}
