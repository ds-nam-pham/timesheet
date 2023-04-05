@extends('layouts.home')

@section('content')
    <form method="post" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mb-3">
            <input hidden type="id" name="id" class="form-control" id="id" value="{{ $user->id }}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="" value="{{ $user->name }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{ $user->email }}">
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">avatar</label>
            <input type="file" name="avatar" class="form-control" id="avatar" value="{{ $user->avatar }}">
            <img src="{{ asset('storage/avatar/' . $user->avatar) }}" alt="avatar" style="margin-top:5px;" width="50" >
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" name="description" class="form-control" id="description" value="{{ $user->description }}">
        </div>
        <div class="mb-3">
            <label for="passsword" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" value="{{ $user->password }}">
        </div>
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop