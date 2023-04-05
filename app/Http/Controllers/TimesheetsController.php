<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use App\Http\Requests\Timesheet\StoreTimesheetsRequest;
use App\Http\Requests\Timesheet\UpdateTimesheetsRequest;

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
     * @param  \App\Http\Requests\TimeSheet\StoreTimesheetsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretimesheetsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timesheets  $timesheets
     * @return \Illuminate\Http\Response
     */
    public function show(Timesheet $timesheets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timesheets  $timesheets
     * @return \Illuminate\Http\Response
     */
    public function edit(StoretimesheetsRequest $timesheets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TimeSheet\UpdatetimesheetsRequest  $request
     * @param  \App\Models\Timesheets  $timesheets
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetimesheetsRequest $request, Timesheet $timesheets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timesheets  $timesheets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timesheet $timesheets)
    {
        //
    }
}
