<?php

namespace App\Http\Controllers;

use App\Question;
use App\Option;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class VoyagerQuestionController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public function store(Request $request)
    {

        $rules = [
            'question_name' => 'required',
            'year' => 'required',
            "subject_id" => 'required',
            "category_id" => 'required'
        ];

        $this->validate($request, $rules);

        try {
            # create data
            $data = [
                "question_name" => $request->question_name,
                "year" => $request->year,
                "school_id" => $request->school_id,
                "subject_id" => $request->subject_id,
                "category_id" => $request->category_id
            ];

            if($request->has('question_image')){
                $data['question_image'] = $request->question_image->store('');
            }

            # create question
            $question = Question::create($data);


            if($question && $request->option_name[0]){

                for($i=0; $i < count($request->option_name); $i++){
                    $option = Option::create([
                        'name' => $request->option_name[$i],
                        'answer' => ($request->option_answer == $i) ?   "Yes" : "No",
                        'question_id' => $question->id,
                        'image' => (!empty($request->option_image[$i])) ?$request->option_image[$i]->store('') : ""
                    ]);
                }
            }

            # log user in
            $success = "Question Created";
            return redirect()->route("voyager.questions.index")->with([
                'message'    => __('voyager::generic.successfully_added_new')." collection",
                'alert-type' => 'success',
            ]);
       
        } catch (\Exception $ex) {
            dump($ex);
        }
    }

    public function update(Request $request, $id)
    {
        // return response($request->all());
        $rules = [
            'question_name' => 'required',
            'year' => 'required',
            "subject_id" => 'required',
            "category_id" => 'required'
        ];

        $this->validate($request, $rules);

        try {
            $question = Question::find($id);
            # create data
            $data = [
                "question_name" => $request->question_name,
                "year" => $request->year,
                "school_id" => $request->school_id,
                "subject_id" => $request->subject_id,
                "category_id" => $request->category_id
            ];

            if($request->has('question_image')){
                $data['question_image'] = $request->question_image->store('');
            }
            # create user
            $update_question = Question::where('id', $id)->update($data);

            if($question && $request->option_name[0]){
                for($i=0; $i < count($request->option_name); $i++){
                    if(!empty($request->option_id[$i])){
                        $option = Option::find($request->option_id[$i]);

                        if($option){
                            $option->name = $request->option_name[$i];
                            $option->answer = ($request->option_answer == $i) ?   "Yes" : "No";
                            if(!empty($request->option_image[$i])){
                                $option->image = $request->option_image[$i]->store('');
                            }
                            $option->save();
                        }
                    }
                    else {
                        $option = Option::create([
                            'name' => $request->option_name[$i],
                            'answer' => ($request->option_answer == $i) ?   "Yes" : "No",
                            'question_id' => $question->id,
                            'image' => (!empty($request->option_image[$i])) ? $request->option_image[$i]->store('') : ""
                        ]);
                    }
                }
            }

            # log user in
            return redirect()->route("voyager.questions.index")->with([
                'message'    => __('voyager::generic.successfully_updated')." collection",
                'alert-type' => 'success',
            ]);
       
        } catch (\Exception $ex) {
            dump($ex);
        }
    }

    public function getQuestionOptions($id)
    {
        $data = Option::where('question_id', $id)->get();
		return response()->json($data);
    }

    public function DeleteOption($question_id, $option_id)
	{
        $data = Option::where(['id' => $option_id, 'question_id'=>$question_id])->first();
        $data = $data->delete();
		return response()->json($data);
    }
}
