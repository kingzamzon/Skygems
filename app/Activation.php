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
        'user_id', 'payment_type', 'status', 'transaction_ref', 'exam_type', 'imei_no'
    ];

    /**
     * activation belongs to user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
