<?php

namespace App\Http\Controllers\Api;

use App\Subject;
use Illuminate\Http\Request;
use App\Services\SubjectService;
use App\Http\Requests\SubjectRequest;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
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
    public function index()
    {
        $data = $this->subjectService->index();

        return response($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        $data = [
            "name" => $request->get('name')
        ];

        $data = $this->subjectService->create($data);

        return response($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($subject)
    {
        $data = $this->subjectService->find($subject);

        return response($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subject)
    {
        try {
            # create data
            $data = [
                "name" => $request->get('name')
            ];

            $data = $this->subjectService->update($subject, $data);

            return response($data);

        } catch (\Exception $ex) {
            dump($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($subject)
    {
        $find_subject = $this->subjectService->find($subject);

        if(!$find_subject){
            return response(['message' => 'Resource Not Found']);
        }
        
        $data = $this->subjectService->destroy($subject);

        return response($data);
    }
}
