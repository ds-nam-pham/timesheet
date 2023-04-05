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
       <td>
          <!-- <button type="button" class="btn btn-sm btn-primary">Edit</button>
          <button type="button" class="btn btn-sm btn-danger">Delete</button> -->
          <a class="btn btn-sm btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>
          <a class="btn btn-sm btn-danger" href="{{ route('user.destroy',$user->id) }}">delete</a>
       </td>
     </tr>
    @endforeach
  </tbody>
</table>
@stop