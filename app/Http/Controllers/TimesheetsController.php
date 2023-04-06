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
        $result = $this->timesheetService->createTimesheet($request->all(), Auth::User()->id);
        return redirect()->route('timesheet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Timesheets  $timesheets
     * @return \Illuminate\Http\Response
     */
    public function show(Timesheet $timesheets, $id)
    {
        
        return view('timesheet.show', [
            'timesheet' => Timesheet::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Timesheets  $timesheets
     * @return \Illuminate\Http\Response
     */
    public function edit(StoretimesheetsRequest $timesheets, $id)
    {
        return view('timesheet.edit', [
            'timesheet' => Timesheet::findOrFail($id)
        ]);
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
        $result = $this->timesheetService->updateTimesheet($request->all(), Auth::User()->id);
        return redirect()->route('timesheet.index');
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
