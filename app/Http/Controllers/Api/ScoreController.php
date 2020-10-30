<?php

namespace App\Http\Controllers\Api;

use App\Score;
use Illuminate\Http\Request;
use App\Services\ScoreService;
use App\Http\Requests\ScoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    protected $scoreService;

    public function __construct(ScoreService $scoreService)
    {
        $this->scoreService = $scoreService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->scoreService->find();

        return response($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScoreRequest $request)
    {
        $data = [
            "score" => $request->get('score')
        ];
        $data['user_id'] = Auth::id();

        $data = $this->scoreService->create($data);

        return response($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    public function leaderBoard()
    {
        // $data =  DB::select("SELECT scores.user_id, SUM(scores.score) as sum_score, COUNT(scores.score) as test_taken, users.name FROM scores LEFT JOIN users ON users.id = scores.user_id GROUP BY scores.user_id, users.name ORDER BY sum_score DESC LIMIT 3");

        $data = DB::select("SELECT scores.user_id, ROUND(SUM(scores.score) / COUNT(scores.score), 2) as avg_score, users.name FROM scores LEFT JOIN users ON users.id = scores.user_id GROUP BY scores.user_id, users.name ORDER BY avg_score DESC LIMIT 3"); 

		return response($data);
    }
}
