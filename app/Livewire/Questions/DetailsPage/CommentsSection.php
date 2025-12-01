<?php

namespace App\Livewire\Questions\DetailsPage;

use App\Modules\Question\Domain\DTO\QuestionDto;
use App\Modules\Question\Domain\Rules\QuestionMustBeOpen;
use App\Modules\Question\Domain\Services\CommentService;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class CommentsSection extends Component
{
    use WithPagination;

    public $questionId;
    public bool $QuestionIsNotOpen ;

    private $comments;
    private QuestionDto $question;
    
    #[Validate('required|min:15')]
    public $textComment='' ;
    
    public $editingId = null;
    
    private CommentService $commentsService;
    
    public function boot(CommentService $commentsService)
    {
        $this->commentsService = $commentsService;
    }

    public function mount(QuestionDto $question)
    {
        $this->questionId = $question->id;
        $this->question = $question;
        $this->QuestionIsNotOpen = QuestionMustBeOpen::validateStatusNot($question->status);
    }

    public function addComment(){
        
        if (!auth('web')->check()) {
            return redirect()->route('login');
        }

        $this->validate();

        try{
            $this->commentsService->createCommentForQuestion(
                questionId: $this->questionId,
                text: $this->textComment,
            );

            $this->dispatch('toast-success', message: 'Comment created successfully');
    
            $this->reset('textComment');
            
            // $this->dispatch('reset-comment');
    
        }catch(\DomainException $e){
            $this->dispatch('toast-error',  message: $e->getMessage());
        }

        // 🔥 إرسال Event إلى Alpine ليغلق الفورم
        $this->dispatch('reset-comment');
        
    }

    public function updateComment(int $commentId, string $newText)
    {
        if (!auth('web')->check()) {
            return redirect()->route('login');
        }

        $this->textComment = $newText ;
        $this->validate();
        
        try {
            $this->commentsService->updateCommentForQuestion($this->questionId,$commentId,$newText);

            $this->editingId = null;

            

            $this->dispatch('toast-success', message: 'Comment updated successfully');

        } catch (\DomainException $e) {
            $this->dispatch('toast-error',  message: $e->getMessage());
        }

        $this->dispatch('reset-comment');
        
    }

    public function deleteComment($commentId){
        if (!auth('web')->check()) {
            return redirect()->route('login');
        }

        try{
            $this->commentsService->deleteCommentForQuestion($this->questionId,$commentId);
            $this->dispatch('toast-success', message: 'Comment deleted successfully');
            
            // لو حذف آخر عنصر من الصفحة → يرجع صفحة للخلف
            if ($this->getPage() > 1) {
                $this->previousPage();
            }

        }catch(\DomainException $e){
            $this->dispatch('toast-error',  message: $e->getMessage());
        }

    }

    public function render()
    {
        return view('livewire.questions.DetailsPage.body.comments-section',[
            'comments' => $this->commentsService
                ->getCommentsWithPaginatedForQuestion(
                    questionId: $this->questionId,
                    perPage: 2
                ),
        ]);
    }
}
