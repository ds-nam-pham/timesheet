@extends('layouts.home')
@section('css')
@vite(['resources/css/calendar.css'])
@endsection
@section('content')
    <form method="post" action="{{ route('timesheet.store') }}" enctype="multipart/form-data" id="form-create">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="task_id" class="form-label">Task ID</label>
            <input type="text" name="task_id" class="form-control" id="task_id" aria-describedby="">
        </div>
        <div class="mb-3">
            <label for="task_content" class="form-label">Content Task</label>
            <input type="text" name="task_content" class="form-control" id="task_content" aria-describedby="">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date Start</label>
            <input type="datetime-local" name="date" class="form-control" id="date" aria-describedby="">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date End</label>
            <input type="datetime-local" name="end_date" class="form-control" id="end_date" aria-describedby="">
        </div>
        <div class="mb-3">
            <label for="time_spent" class="form-label">Time spent</label>
            <input type="text" name="time_spent" class="form-control" id="time_spent" readonly>
        </div>
        <div class="mb-3">
            <label for="difficulties" class="form-label">Difficulties</label>
            <input type="text" name="difficulties" class="form-control" id="difficulties">
        </div>
        <div class="mb-3">
            <label for="plan" class="form-label">Plan</label>
            <input type="tex" name="plan" class="form-control" id="plan">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
@section('javascript')
  @vite(['resources/js/timesheet/timesheet.js'])
@endsection