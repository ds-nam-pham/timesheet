<?php
namespace App\Services\Timesheet;

interface TimesheetService {

    public function createTimesheet($data, $user_id);

    public function listTimesheet();

    public function updateTimesheet($data, $user_id);

}