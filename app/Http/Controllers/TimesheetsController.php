<?php

namespace App\Http\Controllers;

use App\Models\timesheets;
use App\Http\Requests\StoretimesheetsRequest;
use App\Http\Requests\UpdatetimesheetsRequest;

class TimesheetsController extends Controller
{
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
     * @param  \App\Http\Requests\StoretimesheetsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretimesheetsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\timesheets  $timesheets
     * @return \Illuminate\Http\Response
     */
    public function show(timesheets $timesheets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\timesheets  $timesheets
     * @return \Illuminate\Http\Response
     */
    public function edit(timesheets $timesheets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetimesheetsRequest  $request
     * @param  \App\Models\timesheets  $timesheets
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetimesheetsRequest $request, timesheets $timesheets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\timesheets  $timesheets
     * @return \Illuminate\Http\Response
     */
    public function destroy(timesheets $timesheets)
    {
        //
    }
}
