<?php

namespace App\Services;

use App\Score;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ScoreService
{
    public function index()
    {
        return Score::orderBy('id', 'desc')->paginate(15);
    }

    public function create(array $data)
    {
        return Score::create($data);
    }

    public function find()
    {
        return Score::where('user_id', Auth::id())->get();
    }

    public function update(int $score_id, array $data)
    {
        return Score::where('id', $score_id)->update($data);
    }  

    public function destroy(int $score_id)
    {
        return Score::find($score_id)->delete();
    }
}