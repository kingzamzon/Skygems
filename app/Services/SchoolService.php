<?php

namespace App\Services;

use App\School;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class SchoolService
{
    public function index()
    {
        return School::orderBy('id', 'desc')->paginate(15);
    }

    public function create(array $data)
    {
        return School::create($data);
    }

    public function find(int $school_id)
    {
        return School::find($school_id);
    }

    public function update(int $school_id, array $data)
    {
        return School::where('id', $school_id)->update($data);
    }  

    public function destroy(int $school_id)
    {
        return School::find($school_id)->delete();
    }
}