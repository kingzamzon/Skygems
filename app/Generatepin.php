<?php

namespace App;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Generatepin extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pin', 
        'batch_id', 
        'generated_by', 
        'printed', 
        'printed_by', 
        'printed_date', 
        'printed_batch', 
        'used'
    ];

    /**
     * Generate random number
     */
    public static function generatePin()
    {
        return Str::random(12);
    }

    /**
     * Get number before the hypen 1-50 get 1
     */
    public static function getNumberBeforeHypen($string)
    {
        return Str::before($string, '-');
    }

    /**
     * Get number after the hypen 1-50 get 50
     */
    public static function getNumberAfterHypen($string)
    {
        return Str::after($string, '-');
    }

    /**
     * Generatepin belongs to generated_by(user)
     */
    public function generatedBy()
    {
        return $this->belongsTo(User::class, 'generated_by', 'id');
    }

    /**
     * Generatepin belongs to printed_by (user)
     */
    public function printedBy()
    {
        return $this->belongsTo(User::class, 'printed_by', 'id');
    }
}
