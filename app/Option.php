<?php

namespace App;

use App\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'image', 'answer', 'question_id'
    ];

    /**
     * Option belongs to question
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
