<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;
use App\Services\SubjectService;
use App\Http\Requests\GetQuestionRequest;

class QuestionController extends Controller
{
    protected $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(GetQuestionRequest $request)
    {
        $subject = $this->subjectService->find($request->subject);

        $questions = Question::where(['subject_id' => $request->subject, 'category_id' => $request->category, 'year' => $request->year])->orderBy('id', 'desc')->with('option')->get();

        #fields in the sample file
        $fields = ['OptionA', 'OptionB', 'OptionC', 'OptionD', 'OptionE'];

        $alph = ['A', 'B', 'C', 'D'];

        $newData = [];

        for ($i=0; $i < count($questions); $i++) { 
            $data = [
                'QuestNo' => $i+1,
                'Questions' => $questions[$i]->question_name,
            ];

            foreach ($questions[$i]->option as $key => $question) {
                $data[$fields[$key]] = $question->name ;
            }
            foreach ($questions[$i]->option as $key => $question) {
                ($question->answer == "Yes") ? $data['Answers'] = $alph[$key] : '';
            }

            array_push($newData, $data);
        }

        // Write File
        $newJsonString = json_encode($newData, JSON_PRETTY_PRINT);
        file_put_contents(public_path('storage/questions/'.$subject->name.'_'.$request->year.'.json'), stripslashes($newJsonString));

        return response($newData);
    }
}
