<?php

namespace App\Services\Timesheet;

use App\Models\Timesheet;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class TimesheetService extends BaseService implements TimesheetServiceInterface
{

    public function createTimesheet($data, User $user){
        return $user->timesheets()->create([
            'task_id' => Arr::get($data,'task_id'),
            'task_content' => Arr::get($data,'task_content'),
            'date' => Arr::get($data,'date'),
            'end_date' => Arr::get($data,'end_date'),
            'time_spent' => Arr::get($data,'time_spent'),
            'difficulties' => Arr::get($data,'difficulties'),
            'plan' => Arr::get($data,'plan'),
        ]);
    }

    public function listTimesheet(){
        return Timesheet::paginate(5);
    }

    public function updateTimesheet($data,Timesheet $timesheet){
        $timesheet->task_id = Arr::get($data,'task_id');
        $timesheet->task_content = Arr::get($data,'task_content');
        $timesheet->date = Arr::get($data,'date');
        $timesheet->end_date = Arr::get($data,'end_date');
        $timesheet->time_spent = Arr::get($data,'time_spent');
        $timesheet->difficulties = Arr::get($data,'difficulties');
        $timesheet->plan = Arr::get($data,'plan');
        return $timesheet->save();
    }

    public function delete(Timesheet $timesheet){
        return $timesheet->delete();
    }

    public function approve(Timesheet $timesheet){
        return $timesheet->update(['status' => config('constants.APPROVE')]);
    }
}
