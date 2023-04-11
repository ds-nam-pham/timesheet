<?php
   
namespace App\Http\Controllers;

use App\Http\Requests\TimeSheet\StoretimesheetsRequest;
use App\Http\Requests\TimeSheet\UpdatetimesheetsRequest;
use App\Models\Event;
use App\Models\Timesheet;
use App\Services\Calendar\CalendarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect,Response;
   
class FullCalendarController extends Controller
{
    protected $calendarService;
    public function __construct(CalendarService $calendarService)
    {
        $this->calendarService = $calendarService;
    }
 
    public function index()
    {
        if(request()->ajax()) 
        {
            return response()->json(Timesheet::all());
        }
        return view('fullcalendar.index');
    }
    
   
    public function store(StoretimesheetsRequest $request)
    {  
        $event = $this->calendarService->createTimesheet($request->all(), Auth::user()); 
        return response()->json($event);
    }
     
 
    public function update(UpdatetimesheetsRequest $request, Timesheet $timesheet)
    {   
        $event = $this->calendarService->updateTimesheet($request->all(), $timesheet, $request->check_update); 
        return response()->json($event);
    } 
 
 
    public function destroy(Timesheet $timesheet)
    {
        $this->authorize('delete', $timesheet);
        $event = $this->calendarService->delete($timesheet);
   
        return response()->json($event);
    }    

    public function show(Timesheet $timesheet)
    {
        return response()->json($timesheet);
    }

}
