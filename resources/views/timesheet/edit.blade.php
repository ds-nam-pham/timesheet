@extends('layouts.home')

@section('content')
    <form method="POST" action="{{ route('timesheet.update', $timesheet->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="mb-3">
            <input hidden type="id" name="id" class="form-control" id="id" value="{{ $timesheet->id }}">
        </div>
        <div class="mb-3">
            <label for="task_id" class="form-label">Task ID</label>
            <input type="text" name="task_id" class="form-control" id="task_id" aria-describedby="" value="{{ $timesheet->task_id }}">
        </div>
        <div class="mb-3">
            <label for="task_content" class="form-label">Content Task</label>
            <input type="text" name="task_content" class="form-control" id="task_content" aria-describedby="" value="{{ $timesheet->task_content }}">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" id="date" aria-describedby="" value={{ date("Y-m-d", strtotime($timesheet->date)) }}>
        </div>
        <div class="mb-3">
            <label for="time_spent" class="form-label">Time spent</label>
            <input type="text" name="time_spent" class="form-control" id="time_spent" value="{{ $timesheet->time_spent }}">
        </div>
        <div class="mb-3">
            <label for="difficulties" class="form-label">Difficulties</label>
            <input type="text" name="difficulties" class="form-control" id="difficulties" value="{{ $timesheet->difficulties }}">
        </div>
        <div class="mb-3">
            <label for="plan" class="form-label">Plan</label>
            <input type="text" name="plan" class="form-control" id="plan" value="{{ $timesheet->plan }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop