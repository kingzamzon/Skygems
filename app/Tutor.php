<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tutor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'subject', 
        'class_type', 
        'rate_hour', 
        'class_held', 
        'language', 
        'tutor_background', 
        'teaching_methodology', 
        'gender', 
        'address'
    ];

    /**
     * Tutor belongs to user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
