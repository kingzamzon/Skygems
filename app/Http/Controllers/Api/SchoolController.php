<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\School;
use Illuminate\Http\Request;
use App\Services\SchoolService;
use App\Http\Requests\SchoolRequest;

class SchoolController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->schoolService->index();

        return response($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request)
    {
        $data = [
            "name" => $request->get('name')
        ];

        # create user
        $data = $this->schoolService->create($data);

        return response($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show($school)
    {
        $data = $this->schoolService->find($school);

        return response($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $school)
    {
        try {
            # create data
            $data = [
                "name" => $request->get('name')
            ];

            # create user
            $user = $this->schoolService->update($school, $data);

            return response($data);

        } catch (\Exception $ex) {
            dump($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy($school)
    {
        $find_school = $this->schoolService->find($school);

        if(!$find_school){
            return response(['message' => 'Resource Not Found']);
        }
        
        $data = $this->schoolService->destroy($school);

        return response($data);
    }
}
