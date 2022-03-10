@extends('layouts.index')
@section('name','DetailPost')
@section('content')
<div class="card" style="width: 18rem;">
    <div class="card-body">
      <h1 class="card-subtitle mb-2 text-muted">{{$posts->name}}</h1>
      <p class="card-text">{{$posts->content}}</p>
      <a href="{{route('post.index')}}" class="card-link">PostList</a>
    </div>
  </div>
@endsection
