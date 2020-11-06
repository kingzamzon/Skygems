<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends User
{
    protected $table = 'users';

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(function ($query) {
            $query->where('role_id', 2);
        });
    }
}
