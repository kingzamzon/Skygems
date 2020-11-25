<?php

namespace App;

use App\User;
use App\ForumTopic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumComment extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'topic_id', 
        'user_id', 
        'comment',
        'likes'
    ];

    /**
    * ForumComment belongs to ForumTopic
    */
    public function topic()
    {
        return $this->belongsTo(ForumTopic::class, 'topic_id', 'id');
    }

    /**
     * ForumComment belongs to user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
