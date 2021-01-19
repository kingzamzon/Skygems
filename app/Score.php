<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Score extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'result_sheet',
        'result_cum'
    ];

    /**
     * Tutor belongs to user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
