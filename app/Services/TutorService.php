<?php

namespace App\Services;

use App\Tutor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class TutorService
{
    public function index()
    {
        return Tutor::orderBy('id', 'desc')->paginate(15);
    }

    public function create(array $data)
    {
        return Tutor::create($data);
    }

    public function find(int $tutor_id)
    {
        return Tutor::find($tutor_id);
    }

    public function update(int $tutor_id, array $data)
    {
        return Tutor::where('id', $tutor_id)->update($data);
    }  

    public function destroy(int $tutor_id)
    {
        return Tutor::find($tutor_id)->delete();
    }

    public function findTutorBySubject($subject)
    {
        return Tutor::where('subject', $subject)->with('user:id,avatar,phone,username')->get();
    } 
}