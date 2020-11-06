<?php

namespace App\Services;

use App\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class StudentService
{
    public function index()
    {
        return Student::orderBy('id', 'desc')->paginate(15);
    }

    public function create(array $data)
    {
        return Student::create($data);
    }

    public function find(int $student_id)
    {
        return Student::find($student_id);
    }
}