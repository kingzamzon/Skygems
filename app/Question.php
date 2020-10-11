<?php

namespace App;

use App\School;
use App\Subject;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_name', 'question_image', 'year', 'school_id', 'subject_id', 'category_id'
    ];

    /**
     * Question belongs to a single school
     */
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Question belongs to a single subject
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Question belongs to a single category
     */
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}