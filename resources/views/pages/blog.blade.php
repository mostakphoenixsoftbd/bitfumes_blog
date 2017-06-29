@extends('master')

@section('title', 'All blog posts')

@section('main')

<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h1>All blog posts</h1>
      @foreach ($posts as $post)
        <div class="post">
          <div class="page-header">
            <h3>{{ $post->title }}</h3>
            <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read Post</a>
          </div>
          <hr>
        </div>
      @endforeach
    </div>
  </div>
</div>

@stop
