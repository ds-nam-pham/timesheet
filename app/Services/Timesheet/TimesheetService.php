<?php
/**
* UserService class
* Author: trinhnv
* Date: 2021/01/12 10:34
*/

namespace App\Services\Timesheet;

use App\Models\Timesheet;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class TimesheetService extends BaseService implements TimesheetServiceInterface
{
    public function find(Timesheet $timesheet){
        return Timesheet::find($timesheet->id);
    }

    public function createTimesheet($data, User $user){
        return $user->timesheets()->create([
            'task_id' => Arr::get($data,'task_id'),
            'task_content' => Arr::get($data,'task_content'),
            'date' => Arr::get($data,'date'),
            'time_spent' => Arr::get($data,'time_spent'),
            'difficulties' => Arr::get($data,'difficulties'),
            'plan' => Arr::get($data,'plan'),
        ]);
    }

    public function listTimesheet(){
        return Timesheet::all();
    }

    public function updateTimesheet($data,Timesheet $timesheet){
        $timesheet->task_id = Arr::get($data,'task_id');
        $timesheet->task_content = Arr::get($data,'task_content');
        $timesheet->date = Arr::get($data,'date');
        $timesheet->time_spent = Arr::get($data,'time_spent');
        $timesheet->difficulties = Arr::get($data,'difficulties');
        $timesheet->plan = Arr::get($data,'plan');
        $timesheet->save();
        return true;
    }
}
