<?php

namespace App\Services;

use App\Subject;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class SubjectService
{
    public function index()
    {
        return Subject::orderBy('name', 'asc')->get();
    }

    public function create(array $data)
    {
        return Subject::create($data);
    }

    public function find(int $subject_id)
    {
        return Subject::find($subject_id);
    }

    public function update(int $subject_id, array $data)
    {
        return Subject::where('id', $subject_id)->update($data);
    }  

    public function destroy(int $subject_id)
    {
        return Subject::find($subject_id)->delete();
    }
}