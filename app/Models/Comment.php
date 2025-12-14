<?php

namespace App\Models;

use App\Policies\QuestionCommentPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;


#[UsePolicy(QuestionCommentPolicy::class)]
class Comment extends Model
{

    protected $fillable = [
        'comment_text' , 'votes_count' , 'added_by' , 'commentable_id' , 'commentable_type'
    ];

    protected $attributes = [
        'votes_count' => 0,
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'added_by');
    }

    public function votes()
    {
        return $this->morphMany(Vote::class, 'votable');
    }
    
}
