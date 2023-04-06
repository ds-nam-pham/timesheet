@extends('layouts.home')

@section('content')
    <form>
        <div class="mb-3">
            <label for="task_id" class="form-label">Task ID</label>
            <label class="form-control" for="task_id" class="form-label">{{ $timesheet->task_id }}</label>
        </div>
        <div class="mb-3">
            <label for="task_content" class="form-label">Content Task</label>
            <label class="form-control" for="task_content" class="form-label">{{ $timesheet->task_content }}</label>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <label class="form-control" for="date" class="form-label">{{ date("d/m/Y", strtotime($timesheet->date))}}</label>
        </div>
        <div class="mb-3">
            <label for="time_spent" class="form-label">Time spent</label>
            <label class="form-control" for="time_spent" class="form-label">{{ $timesheet->time_spent }}</label>
        </div>
        <div class="mb-3">
            <label for="difficulties" class="form-label">Difficulties</label>
            <label class="form-control" for="difficulties" class="form-label">{{ $timesheet->difficulties }}</label>
        </div>
        <div class="mb-3">
            <label for="plan" class="form-label">Plan</label>
            <label class="form-control" for="plans" class="form-label">{{ $timesheet->plan }}</label>
        </div>
    </form>
@stop