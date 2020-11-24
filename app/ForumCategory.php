<?php

namespace App;

use App\ForumTopic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForumCategory extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'description', 
        'color'
    ];

    /**
     * Forum has many topic
     */
    public function topic()
    {
        return $this->hasMany(ForumTopic::class, 'category_id', 'id');
    }
}
