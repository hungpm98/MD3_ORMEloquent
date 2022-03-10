@extends('layouts.index')

@section('name')
<div class="row">
    <div class="col-9">
        PostList
    </div>
    <div class="col-3">
        <a href="{{route('post.showFormCreate')}}" class="btn btn-primary">Create</a>
    </div>
</div>
@endsection
@section('content')
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Content</th>
        <th scope="col">User_id</th>
        <th scope="col" colspan="3" style="text-align: center">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->user_id}}</td>
            <td><a onclick="return confirm('Are u sure?')" href="{{route('post.delete',$post->id)}}">Delete</a></td>
            <td><a href="{{route('post.detail',$post->id)}}">Detail</a></td>
            <td><a href="{{route('post.update',$post->id)}}">Edit</a></td>
        </tr>
        @endforeach

    </tbody>
  </table>
@endsection
