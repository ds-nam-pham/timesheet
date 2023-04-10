<?php
namespace App\Services\Timesheet;

use App\Models\Timesheet;
use App\Models\User;

interface TimesheetServiceInterface {

    public function find(Timesheet $timesheet);

    public function createTimesheet($data, User $userId);

    public function listTimesheet();

    public function updateTimesheet($data, Timesheet $timesheet);

}