<?php

namespace App\Http\Controllers\Api;

use App\Activation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ActivationService;
use App\Http\Requests\ActivationRequest;

class ActivationController extends Controller
{
    protected $activationService;

    public function __construct(ActivationService $activationService)
    {
        $this->activationService = $activationService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivationRequest $request)
    {
        $data = [
            "user_id" => $request->get('user_id'),
            "software" => $request->get('software'),
            "reference" => $request->get('reference'),
            "expiry_date" => $request->get('expiry_date')
        ];

        $data = $this->activationService->create($data);

        return response($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function show($activation)
    {
        $data = $this->categoryService->find($category);

        return response($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activation $activation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activation  $activation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activation $activation)
    {
        //
    }
}
