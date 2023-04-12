@extends('layouts.home')
@section('Page Heading')
  <p>Timesheet</p>
@stop
@section('content')
<table class="table">
  <thead>
    <tr class="text-center">
      <th scope="col">Date</th>
      <th scope="col">Task Id</th>
      <th scope="col">Content Task</th>
      <th scope="col">Task spent</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($userTimesheets as $timesheet)
     <tr class="text-center">
       <th scope="row"> {{ date("d/m/Y", strtotime($timesheet->date))}} </th>
       <td>{{$timesheet->task_id}}</td>
       <td>{{$timesheet->task_content}}</td>
       <td>{{$timesheet->time_spent}}</td>
       <td>
          <!-- <button type="button" class="btn btn-sm btn-primary">Edit</button>
          <button type="button" class="btn btn-sm btn-danger">Delete</button> -->
          <a class="btn btn-sm btn-primary" href="{{ route('timesheet.edit',$timesheet->id) }}">Edit</a>
          <a class="btn btn-sm btn-success" href="{{ route('timesheet.show',$timesheet->id) }}">Show</a>
       </td>
     </tr>
    @endforeach
  </tbody>
</table>
@stop