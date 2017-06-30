@extends('master')

@section('title', 'All posts')

@section('content')

<div class="row">
  <div class="col-md-12">
    <a class="btn btn-success" href="{{ url('posts/create') }}">New post +</a>
    <div class="page-header">
      <h1>All Posts</h1>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>title</th>
          <th>body</th>
          <th>user</th>
          <th>created at</th>
          <th>actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ substr($post->body,0,60) }}{{ strlen($post->body) > 60 ? "..." : "" }}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->created_at->diffForHumans()}}</td>
            <td>
              <div class="btn-group">
                <a class="btn btn-default btn-sm" href="{{ route('posts.show', $post->id) }}">View</a>
              </div>
              <div class="btn-group">
                <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="text-center">
      {{ $posts->links() }}
    </div>
  </div>
  <hr>
  <div class="col-md-12">
    <div class="page-header">
      <h2>All your posts</h2>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>title</th>
          <th>body</th>
          <th>user</th>
          <th>created at</th>
          <th>actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach (Auth::user()->posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ substr($post->body,0,60) }}{{ strlen($post->body) > 60 ? "..." : "" }}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->created_at->diffForHumans()}}</td>
            <td>
              <div class="btn-group">
                <a class="btn btn-default btn-sm" href="{{ route('posts.show', $post->id) }}">View</a>
              </div>
              <div class="btn-group">
                <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop
