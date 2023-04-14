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
    @foreach($timesheets as $timesheet)
     <tr>
       <th class="text-center" scope="row"> {{ date("d/m/Y", strtotime($timesheet->date))}} </th>
       <td class="text-center">{{$timesheet->task_id}}</td>
       <td class="text-center">{{$timesheet->task_content}}</td>
       <td class="text-center">{{$timesheet->time_spent}}</td>
       <td>
            <a class="btn btn-sm btn-primary" href="{{ route('timesheet.edit',$timesheet->id) }}">Edit</a>
            <a class="btn btn-sm btn-info" href="{{ route('timesheet.show',$timesheet->id) }}">Show</a>
          @if($timesheet->status == 0)
            <a class="btn btn-sm btn-success" href="{{ route('timesheet.approve',$timesheet->id) }}">Approve</a>
          @endif
       </td>
     </tr>
    @endforeach
  </tbody>
</table>
@stop