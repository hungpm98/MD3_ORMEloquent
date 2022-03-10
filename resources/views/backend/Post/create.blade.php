@extends('layouts.index')
@section('name','CreatePost')
@section('content')
<form method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Content</label>
      <input name="content" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">User_id</label>
      <input name="user_id" type="number" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
