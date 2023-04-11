<?php
namespace App\Services\Calendar;

use App\Models\Timesheet;
use App\Models\User;
use App\Services\BaseService;
use App\Services\Timesheet\TimesheetService;
use Illuminate\Support\Arr;

class CalendarService extends BaseService implements CalendarServiceInterface
{
    protected $timesheet;
    public function __construct(TimesheetService $timesheet)
    {
        $this->timesheet = $timesheet;
    }
    public function find(Timesheet $timesheet){
        return Timesheet::find($timesheet->id);
    }

    public function createTimesheet($data, User $user){
        $this->timesheet->createTimesheet($data, $user);
    }

    public function listTimesheet(){
        return Timesheet::all();
    }

    public function updateTimesheet($data,Timesheet $timesheet, $check){
        if(!$check){
            $timesheet->date = Arr::get($data,'date');
            return $timesheet->save();
        }
        return $this->timesheet->updateTimesheet($data, $timesheet);
    }

    public function delete(Timesheet $timesheet){
        return $timesheet->delete();
    }
    
}
