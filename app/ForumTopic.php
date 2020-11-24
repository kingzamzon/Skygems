<?php

namespace App;

use App\User;
use App\ForumCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumTopic extends Model
{
    use SoftDeletes;
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
        'flag'
    ];

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

}
