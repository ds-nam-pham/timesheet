<?php
   
namespace App\Http\Controllers;
   
use App\Models\Event;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect,Response;
   
class FullCalendarController extends Controller
{
 
    public function index()
    {
        if(request()->ajax()) 
        {
            $Timesheets = Timesheet::all();
            $data = [];
            foreach ($Timesheets as $key => $Timesheet) {
                $insertArr = [ 'task_id' => $Timesheet->task_id,
                       'title' => $Timesheet->task_content,
                       'date' => $Timesheet->date,
                       'time_spent' => $Timesheet->time_spent,
                       'difficulties' => $Timesheet->difficulties,
                       'plan' => $Timesheet->plan,
                       'user_id' => Auth::User()->id
                    ];
                    array_push($data, $insertArr);
                }
            return response()->json($data);
        }
        return view('fullcalendar.index');
    }
    
   
    public function store(Request $request)
    {  
        $insertArr = [ 'task_id' => $request->task_id,
                       'task_content' => $request->task_content,
                       'date' => $request->date,
                       'time_spent' => $request->time_spent,
                       'difficulties' => $request->difficulties,
                       'plan' => $request->plan,
                       'user_id' => Auth::User()->id
                    ];
        $event = Timesheet::create($insertArr);   
        return response()->json($event);
    }
     
 
    public function update(Request $request)
    {   
        $where = array('id' => $request->id);
        $event  = Timesheet::where($where)->update(['date' => $request->date]);
        return response()->json($event);
    } 
 
 
    public function destroy(Request $request)
    {
        $event = Timesheet::where('id',$request->id)->delete();
   
        return response()->json($event);
    }    

}
