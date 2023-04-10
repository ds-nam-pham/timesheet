<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use App\Http\Requests\Timesheet\StoreTimesheetsRequest;
use App\Http\Requests\Timesheet\UpdateTimesheetsRequest;
use App\Services\Timesheet\TimesheetService;
use Illuminate\Support\Facades\Auth;

class TimesheetsController extends Controller
{
    protected $timesheetService;
    public function __construct(TimesheetService $timesheetService)
    {
        $this->timesheetService = $timesheetService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->timesheetService->listTimesheet();
        return view('timesheet.index', ['timesheets'=>$result]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('timesheet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\TimeSheet\StoreTimesheetsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretimesheetsRequest $request)
    {
        $result = $this->timesheetService->createTimesheet($request->all(), Auth::User());
        return redirect()->route('timesheet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timesheet  $timesheets
     * @return \Illuminate\Http\Response
     */
    public function show(Timesheet $timesheet)
    {
        return view('timesheet.show', [
            'timesheet' => $timesheet
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timesheet  $timesheets
     * @return \Illuminate\Http\Response
     */
    public function edit(Timesheet $timesheet)
    {
        return view('timesheet.edit', [
            'timesheet' => $timesheet
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\TimeSheet\UpdatetimesheetsRequest  $request
     * @param  \App\Models\Timesheet  $timesheet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetimesheetsRequest $request, Timesheet $timesheet)
    {
        $result = $this->timesheetService->updateTimesheet($request->all(), $timesheet);
        return redirect()->route('timesheet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Timesheet  $timesheets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Timesheet $timesheet)
    {
        //
    }
}
