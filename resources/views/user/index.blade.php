@extends('layouts.home')
@section('Page Heading')
  <p>User</p>
@stop
@section('content')
<table class="table">
  <thead>
    <tr class="text-center">
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">avatar</th>
      <th scope="col">description</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
     <tr class="text-center">
       <th scope="row">{{$user->name}}</th>
       <td>{{$user->email}}</td>
       <td>
        <img src="{{ asset('storage/avatar/' . $user->avatar) }}" alt="avatar" width="50">
       </td>
       <td>{{$user->description}}</td>
       <td class="text-center d-flex">
          <a class="btn btn-sm btn-primary" href="{{ route('user.edit',$user->id) }}"><i class="fa fa-edit"> </i></a>
          <form method="POST" action="{{ route('user.destroy', $user->id) }}">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'> <i class="fa fa-trash"> </i></button>
        </form>
       </td>
     </tr>
    @endforeach
  </tbody>
</table>
<script type="text/javascript">
  $('.show_confirm').click(function(e) {
      if(!confirm('Are you sure you want to delete this?')) {
          e.preventDefault();
      }
  });
</script>
@stop
