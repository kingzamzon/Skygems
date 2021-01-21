<?php

namespace App\Http\Controllers;

use App\Generatepin;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;

class VoyagerGeneratePinsController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'batch_id' => 'required'
        ];

        $this->validate($request, $rules);

        $start_number = Generatepin::getNumberBeforeHypen($request->batch_id);
        $stop_number = Generatepin::getNumberAfterHypen($request->batch_id);

        for ($x = $start_number; $x <= $stop_number; $x++) {
            $pins = Generatepin::create([
                'pin' => Generatepin::generatePin(),
                'batch_id' => $request->batch_id,
                'generated_by' => Auth::id(),
                'printed' => "No",
                'used' => "No",
            ]);
        } 

        # log user in
        $success = "Pin's Genereated";
        return redirect()->route("voyager.generatepins.index")->with([
            'message'    => __('voyager::generic.successfully_added_new')." collection",
            'alert-type' => 'success',
        ]);
    }

}
