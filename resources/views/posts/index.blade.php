@extends('master')

@section('title', 'All posts')

@section('content')

<div class="row">
  <div class="col-md-12">
    <a class="btn btn-success" href="{{ url('posts/create') }}">New post +</a>
    <div class="page-header">
      <h1>All Posts</h1>
    </div>
    @if (count($posts) > 0)
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>title</th>
            <th>body</th>
            <th>user</th>
            <th>category</th>
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
              <td>
                @if ($post->category_id == true)
                  <a class="btn btn-info btn-sm" href="{{ route('categories.show', $post->category_id) }}">{{ $post->category->name }}</a>
                @elseif ($post->category_id == null)
                  <a class="btn btn-info btn-sm" href="{{ route('posts.edit', $post->id) }}">Uncategorized</a>
                @endif
              </td>
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
    @else
      <p class="alert alert-info">There haven't been any post created yet, be the first !</p>
      <a class="btn btn-success btn-sm" href="{{ url('posts/create') }}">Create +</a>
    @endif

    <div class="text-center">
      {{ $posts->links() }}
    </div>
  </div>
  <hr>
  <div class="col-md-12">
    <div class="page-header">
      <h2>All your posts</h2>
    </div>
    @if (count(Auth::user()->posts) > 0)
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>title</th>
            <th>body</th>
            <th>user</th>
            <th>category</th>
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
              <td>
                @if ($post->category_id == true)
                  <a class="btn btn-info btn-sm" href="{{ route('categories.show', $post->category_id) }}">{{ $post->category->name }}</a>
                @elseif ($post->category_id == null)
                  <a class="btn btn-info btn-sm" href="{{ route('posts.create') }}">Uncategorized</a>
                @endif
              </td>
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
    @else
      <p class="alert alert-info">You haven't created any post yet!</p>
    @endif
  </div>
</div>

@stop
