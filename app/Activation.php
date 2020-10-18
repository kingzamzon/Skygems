<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'software', 'reference', 'expiry_date'
    ];

    /**
     * activation belongs to user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
