@extends('layouts.home')

@section('content')
    <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="name" class="form-label">User Name</label>
            <input type="text" name="name" class="form-control" id="name" aria-describedby="">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        </div>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="avatar" class="form-label">avatar</label>
            <input type="file" name="avatar" class="form-control" id="avatar">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" name="description" class="form-control" id="description">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div> -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop