<?php

namespace App\Http\Controllers\Api;

use App\Score;
use Illuminate\Http\Request;
use App\Services\ScoreService;
use App\Http\Requests\ScoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

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
}
