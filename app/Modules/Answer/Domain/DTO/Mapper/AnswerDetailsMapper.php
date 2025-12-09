<?php 

namespace App\Modules\Answer\Domain\DTO\Mapper;

use App\Models\Answer;
use App\Modules\Answer\Domain\DTO\AnswerDto;
use App\Modules\Answer\Domain\DTO\UserDtoWireable;
use App\Modules\Answer\Domain\DTO\VoteDtoWireable;


final class AnswerDetailsMapper 
{
    
    public static function fromModel(Answer $answer)
    {
        return new AnswerDto(
            id : $answer->id,
            description: $answer->description,
            votesCount: $answer->votes_count,
            status: $answer->status,
            isAccepted: $answer->is_accepted,
            createdAt: $answer->created_at,
            updatedAt: $answer->updated_at,
            
            questionId : $answer->question_id ,

            comments : $answer->comments->map(
                        fn($comment) => CommentMapperWireable::fromModel($comment)
                    )->toArray(),
            
            author: UserDtoWireable::fromModel($answer->user),

            myVote: $answer->myVote !=null ? VoteDtoWireable::fromModel($answer->myVote): null ,
            
        );
    }
}
