<?php
namespace App\Services\Calendar;

use App\Models\Timesheet;
use App\Models\User;

interface CalendarServiceInterface {
    public function createTimesheet($data, User $userId);

    public function listTimesheet();

    public function updateTimesheet($data, Timesheet $timesheet, $check);

    public function delete(Timesheet $timesheet);

}