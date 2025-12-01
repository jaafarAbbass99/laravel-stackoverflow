<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'vote_type','voted_by','votable_id','votable_type'
    ];

    public function votable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'voted_by');
    }

    public function scopeUp($query)
    {
        return $query->where('vote_type', 1);
    }

    public function scopeDown($query)
    {
        return $query->where('vote_type', -1);
    }

    
}
