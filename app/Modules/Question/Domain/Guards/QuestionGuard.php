<?php 


namespace App\Modules\Question\Domain\Guards;

use App\Models\Question;
use App\Modules\Question\Domain\Rules\QuestionMustBeOpen;
use Closure;
use Illuminate\Support\Facades\DB;

class QuestionGuard {

    public static function withOpenQuestion(
        int $questionId,
        Closure $callback
    ){
        return DB::transaction(function () use ($questionId, $callback) {

            $question = Question::select('id', 'status')
                ->where('id', $questionId)
                ->lockForUpdate()
                ->firstOrFail();

            QuestionMustBeOpen::check($question);

            return $callback($question);
        });
    }

}