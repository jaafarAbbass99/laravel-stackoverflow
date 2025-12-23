<?php 

namespace App\Modules\Question\Domain\Services;

use App\Models\Comment;
use App\Models\Question;
use App\Modules\Question\Domain\DTO\Mappers\CommentMapper;
use App\Modules\Question\Domain\DTO\Mappers\CreateCommentMapper;
use App\Modules\Question\Domain\Guards\QuestionGuard;
use App\Modules\Question\Domain\Repositories\QuestionCommentsRepositoryInterface;
use App\Modules\Question\Domain\Rules\QuestionMustBeOpen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CommentService
{
    public function __construct(
        private QuestionCommentsRepositoryInterface $commentRepo
    ) {}

    public function getCommentsWithPaginatedForQuestion(int $questionId, int $perPage = 2)
    {
        $comments = $this->commentRepo->getCommentsWithPaginated($questionId,$perPage);

        // تحويل العناصر إلى DTOs
        $comments->setCollection(
            $comments->getCollection()->map(
                fn($comment) => CommentMapper::fromModel($comment)
            )
        );
        return $comments;
    }
    
    public function createCommentForQuestion($questionId , string $text){

        return QuestionGuard::withOpenQuestion($questionId, function ($question) use ($text) {

            $comment = $this->commentRepo->createComment(
                $question->id,
                Auth::id(),
                $text
            );
    
            if (! $comment) {
                throw new \DomainException('Failed to create comment');
            }
            
            return CreateCommentMapper::fromModel(
                comment: $comment,
                authorId: Auth::id(),
                author: Auth::user()->name,
            );
        });
        
    }

    public function updateCommentForQuestion(int $questionId , int $commentId,string $newText){
        
        return QuestionGuard::withOpenQuestion($questionId , function() use($newText,$commentId){

            $updated = $this->commentRepo->updateComment($commentId ,Auth::id(), $newText );
    
            if (! $updated) {
                throw new \DomainException('Unable to update comment.');
            }
        });

    }

    public function deleteCommentForQuestion(int $questionId , int $commentId){
        
        return QuestionGuard::withOpenQuestion($questionId , function() use($commentId ){
            
            $deleted = $this->commentRepo->deleteComment($commentId, Auth::id());
    
            if (! $deleted) {
                throw new \DomainException('Unable to delete comment.');
            }

        });

    }



}
