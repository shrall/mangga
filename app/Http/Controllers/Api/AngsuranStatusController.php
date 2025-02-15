<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SuccessResource;
use App\Models\AngsuranStatus;
use Illuminate\Http\Request;

class AngsuranStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = AngsuranStatus::all();
        $return = [
            'api_code' => 200,
            'api_status' => true,
            'api_message' => 'Sukses',
            'api_results' => $statuses
        ];
        return SuccessResource::make($return);
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
     * @param  \App\Models\AngsuranStatus  $angsuranStatus
     * @return \Illuminate\Http\Response
     */
    public function show(AngsuranStatus $angsuranStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AngsuranStatus  $angsuranStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AngsuranStatus $angsuranStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AngsuranStatus  $angsuranStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(AngsuranStatus $angsuranStatus)
    {
        //
    }
}
