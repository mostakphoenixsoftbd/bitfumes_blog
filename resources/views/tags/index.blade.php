@extends('master')

@section('title', 'All Tags')

@section('content')

<div class="row">
  <div class="col-md-6">
    <a class="btn btn-success" href="{{ url('posts') }}">Back to posts</a>
    <div class="page-header">
      <h1>All Tags</h1>
    </div>
    @if (count($tags) > 0)
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>name</th>
            <th>created at</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($tags as $tag)
            <tr>
              <td>{{ $tag->id }}</td>
              <td>{{ $tag->name }}</td>
              <td>{{ $tag->created_at->diffForHumans() }}</td>
              <td>
                <div class="btn-group">
                  <a class="btn btn-default btn-sm" href="{{ route('tags.show', $tag->id) }}">View</a>
                </div>
                <div class="btn-group">
                  <a class="btn btn-primary btn-sm" href="{{ route('tags.edit', $tag->id) }}">Edit</a>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p class="alert alert-info">There haven't been any tag created yet, be the first !</p>
    @endif
  </div>
  <div class="col-md-4 col-md-offset-2">
    <div class="page-header">
      <h1>Create Tag</h1>
    </div>

    {!! Form::open(['route' => 'tags.store']) !!}
      <div class="form-group">
        {{ Form::label('name', "Tag :") }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
      </div>
      <div class="btn-group">
        {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
      </div>
    {!! Form::close() !!}
  </div>
</div>

@stop
