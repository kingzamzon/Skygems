<?php

namespace App\Http\Controllers\Api;

use App\Activation;
use App\Generatepin;
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
        /**
         * if payment_type = pin & pin have been used
         *          
         */
        if( ($request->get("payment_type") == "pin") && (!$this->checkPinUsage($request->get('transaction_ref'), 'no')) ) {
            return response(['error' => 'In-valid PIN']);
        } else {
            $pin_id =  $this->checkPinUsage($request->get('transaction_ref'), 'no')->id;
            Generatepin::where('id', $pin_id)->update([  "used" => "yes"]); 
        } 

        $data = [
            "user_id" => $request->get('user_id'),
            "payment_type" => $request->get('payment_type'),
            "status" => $request->get('status'),
            "transaction_ref" => $request->get('transaction_ref'),
            "exam_type" => $request->get('exam_type'),
            "imei_no" => $request->get('imei_no'),
        ];

        return response($data);
    }

    public function checkPinUsage($pin, $status) {
        return Generatepin::where(['pin' => $pin, 'used' => $status])->first();
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
