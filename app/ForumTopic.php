<?php

namespace App;

use App\User;
use App\ForumCategory;
use App\ForumComment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumTopic extends Model
{
    use SoftDeletes;

    const OPEN_FLAG = "Open";
    const CLOSE_FLAG = "Close";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'title', 
        'slug',
        'body',
        'category_id', 
        'tag', 
        'flag',
        'views', 
        'likes'
    ];

    protected $appends = [
        'date'
    ];

    /**
     * 
     * Getters
     */

    public function getDateAttribute($value)
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    /**
     * Relationships
     */

    /**
     * ForumTopic belongs to user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * ForumTopic belongs to ForumCategory
    */
    public function category()
    {
        return $this->belongsTo(ForumCategory::class, 'category_id', 'id');
    }

    /**
     * Forum has many topic
     */
    public function comment()
    {
        return $this->hasMany(ForumComment::class, 'topic_id', 'id');
    }

}
