@extends('master')

@section('title', $post->title)

@section('content')

<div class="row">
  <div class="col-md-12">
    <a class="btn btn-success" href="{{ url('posts') }}">Back to posts</a>

    <div class="page-header">
      <h1>{{ $post->title }}</h1>
    </div>

    @if ($post->category_id == true)
      <a class="btn btn-info btn-sm" href="{{ route('categories.show', $post->category->id) }}">{{ $post->category->name }}</a>
    @elseif ($post->category_id == null)
      <a class="btn btn-info btn-sm" href="{{ route('posts.edit', $post->id) }}">Uncategorized</a>
    @endif

    <p>
      this post was created by <strong>{{ $post->user->name }} , {{ $post->created_at->diffForHumans() }}</strong>
    </p>

    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">@</span>
      <input type="text" class="form-control" placeholder="{{ $post->slug }}" aria-describedby="basic-addon1">
    </div>
    <br>
      <p class="lead">
        {{ $post->body }}
      </p>
    <div class="btn-group">
      <a class="btn btn-success" href="{{ route('posts.edit',$post->id) }}">Edit</a>
    </div>
    <div class="btn-group">
      {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
      {!! Form::close() !!}
    </div>
  </div>
</div>

@stop
