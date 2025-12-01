<?php

namespace App\Policies;

use App\Enums\QuestionStatus;
use App\Models\Comment;
use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class QuestionCommentPolicy
{

    public function create(User $user  , Question $question): bool
    {
        return in_array($question->status,[ QuestionStatus::OPEN  ,QuestionStatus::REOPEN]);
    }

    public function update(User $user, Comment $comment ): bool
    {
        return false;
    }

    public function delete(User $user, Comment $comment): bool
    {
        return false;
    }

    public function restore(User $user, Comment $comment): bool
    {
        return false;
    }

    public function forceDelete(User $user, Comment $comment): bool
    {
        return false;
    }
}
