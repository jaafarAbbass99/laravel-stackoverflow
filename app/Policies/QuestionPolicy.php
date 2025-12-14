<?php

namespace App\Policies;

use App\Models\Question;
use App\Models\User;
use Illuminate\Auth\Access\Response;


class QuestionPolicy
{
    public function createAnswer(User $user , Question $question): Response
    {
        if ($question->is_closed) {
            return Response::deny(
                'This question is closed and no longer accepts new answers.'
            );
        }
    
        if ($user->id === $question->user_id) {
            return Response::deny(
                'You cannot answer your own question.'
            );
        }
        return Response::allow();
    }
    
}
