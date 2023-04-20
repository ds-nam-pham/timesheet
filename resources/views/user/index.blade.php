@extends('layouts.home')
@section('css')
@vite(['resources/css/user.css'])
@endsection
@section('Page Heading')
  <p>User</p>
@stop
@section('content')
<div>
  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="search" name="search" class="form-control bg-light border-0 small" placeholder="Search for..."
            aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-primary">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
</div>
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
<div>
    <button class="float-sm-end"> 
      <a href="{{ route('excel.export') }}">export excel</a>
    </button>
</div>
<div class="paginationWrap">
    @if(isset($users) && count($users) > 0)
        {{ $users->links('paginate') }}
    @endif
</div>
<script type="text/javascript">
  $('.show_confirm').click(function(e) {
      if(!confirm('Are you sure you want to delete this?')) {
          e.preventDefault();
      }
  });
</script>
@stop
