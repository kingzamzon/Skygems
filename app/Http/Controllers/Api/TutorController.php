<?php

namespace App\Http\Controllers\Api;

use App\Tutor;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\TutorService;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterTutorRequest;
use Illuminate\Validation\Validator; 

class TutorController extends Controller
{
    protected $userService, $tutorService;

    public function __construct(UserService $userService, TutorService $tutorService)
    {
        $this->userService = $userService;
        $this->tutorService = $tutorService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->tutorService->index();

        return response($data);
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
    public function store(RegisterTutorRequest $request)
    {
        // return redirect()->back();
        // return $request->all();

        $data = [
            "name" => $request->get('name'),
            "email" => $request->get('email'),
            "phone" => $request->get('phone'),
            "username" => $request->get('username'),
            "role_id" => "3",
        ];

        $data['password'] = bcrypt($request->password);

        # create user
        $user = $this->userService->create($data);

        $this->tutorService->create([
            'user_id' => $user->id,
            'subject' => $request->get('subject'), 
            'class_type' => $request->get('class_type'),
            'rate_hour' => $request->get('rate_hour'),
            'class_held' => $request->get('class_held'),
            'language' => $request->get('language'),
            'tutor_background' => $request->get('tutor_background'),
            'teaching_methodology' => $request->get('teaching_methodology'),
            'gender' => $request->get('gender'),
            'address' => $request->get('address')
        ]);
        
        #redirect to congratulation
        $success = "Successfully Registered";
        return redirect( route('onboard.index') )->with(['data' => $success]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show($tutor)
    {
        $data = $this->tutorService->find($tutor);

        return response($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit(Tutor $tutor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutor $tutor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tutor $tutor)
    {
        //
    }
}
