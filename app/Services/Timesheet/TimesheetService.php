<?php
/**
* UserService class
* Author: trinhnv
* Date: 2021/01/12 10:34
*/

namespace App\Services\Timesheet;

use App\Models\Timesheet;
use App\Services\BaseService;
use Illuminate\Support\Facades\Hash;

class TimesheetService extends BaseService
{
    public function createTimesheet($data, $user_id){
        $timesheet = Timesheet::create([
            'user_id' => $user_id,
            'task_id' => $data['task_id'],
            'task_content' => $data['task_content'],
            'date' => $data['date'],
            'time_spent' => $data['time_spent'],
            'difficulties' => $data['difficulties'],
            'plan' => $data['plan'],
        ]);
        return true;
    }

    public function listTimesheet(){
        $timesheet = Timesheet::all();
        return $timesheet;
    }

    public function updateTimesheet($data, $user_id){
        $timesheet = Timesheet::find($data['id']);
        $timesheet->user_id = $user_id;
        $timesheet->task_id = $data['task_id'];
        $timesheet->task_content = $data['task_content'];
        $timesheet->date = $data['date'];
        $timesheet->time_spent = $data['time_spent'];
        $timesheet->difficulties = $data['difficulties'];
        $timesheet->plan = $data['plan'];
        $timesheet->save();
        return true;
    }
}
