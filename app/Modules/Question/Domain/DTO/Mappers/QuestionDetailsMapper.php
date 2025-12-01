<?php

namespace App\Modules\Question\Domain\DTO\Mappers;

use App\Models\Question;
use App\Modules\Question\Domain\DTO\QuestionDto;
use App\Modules\Question\Domain\DTO\TagDto;
use App\Modules\Question\Domain\DTO\UserDto;
use App\Modules\Question\Domain\DTO\VoteDto;

final class QuestionDetailsMapper
{
    public static function fromModel(Question $q): QuestionDto
    {
        
        return new QuestionDto(
            id: $q->id,
            title: $q->title,
            description: $q->description,
            createdAt: $q->created_at,
            updatedAt: $q->updated_at,

            viewsCount: $q->views_count,
            answersCount: $q->answers_count,
            votesCount: $q->votes_count,
            status: $q->status,
            acceptedAnswerId: $q->accepted_answer_id,

            user: UserDto::fromModel($q->user),

            tags: $q->tags->map(
                fn($tag) => TagDto::fromModel($tag)
            )->toArray(),

            myVote: $q->myVote !=null ? VoteDto::fromModel($q->myVote): null ,
        );
    }
}
