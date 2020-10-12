<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('id', 'desc')->with('option')->get();
        // ->random(1);

        $alph = ['A', 'B', 'C', 'D'];

        $newData = [];

        for ($i=0; $i < count($questions); $i++) { 
            $data = [
                'QuesNo' => $i+1,
                'Questions' => $questions[$i]->question_name,
                'options' => [],
            ];

            foreach ($questions[$i]->option as $key => $question) {
                $data['options'][$key] = [
                    'name' => $question->name
                ];
            }
            foreach ($questions[$i]->option as $key => $question) {
                ($question->answer == "Yes") ? $data['Answers'] = $alph[$key] : '';
            }

            array_push($newData, $data);
        }

        // Write File
        $newJsonString = json_encode($newData, JSON_PRETTY_PRINT);
        file_put_contents(public_path('storage/questions/en.json'), stripslashes($newJsonString));

        return response($newData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
