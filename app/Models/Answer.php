<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Auth;

class Answer extends Model
{
    protected $fillable = [
        'description' ,'votes_count' ,'status' , 
        'is_accepted' , 'user_id','question_id'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function question() : BelongsTo {
        return $this->belongsTo(Question::class);
    }

    public function comments() : MorphMany
    {
        return $this->morphMany(Comment::class,'commentable') ;
    }

    public function votes()
    {
        return $this->morphMany(Vote::class, 'votable');
    }

    public function myVote()
    {
        return $this->morphOne(Vote::class ,'votable')->where('voted_by', Auth::id());
    }
    

}
