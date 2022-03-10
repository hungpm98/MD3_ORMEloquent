@extends('layouts.index')
@section('name','EditPost')
@section('content')
<form method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Content</label>
      <input name="content" type="text" value="{{$posts->content}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">User_id</label>
      <input name="user_id" type="number" value="{{$posts->user_id}}" class="form-control" id="exampleInputPassword1">
    </div>
    <button class="btn btn-primary">Edit</button>
  </form>
@endsection
