<?php

namespace App\Models;

use App\Enums\QuestionStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title' , 'description' , 'views_count' , 'answers_count' ,'votes_count' ,'status' , 
        'accepted_answer_id' , 'user_id'
    ];

    protected $casts = [
        // 'status' => QuestionStatus::class,
    ];
    
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function answers():HasMany
    {
        return $this->hasMany(Answer::class);
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
        return $this->morphOne(Vote::class, 'votable')
            ->where('voted_by', Auth::id());
    }

    public function userVote() // تصويت المستخدم الحالي
    {
        return $this->morphOne(Vote::class, 'votable')
            ->where('voted_by', auth('web')->id());
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'question_tags');
    }


}
