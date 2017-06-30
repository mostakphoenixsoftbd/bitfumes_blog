@extends('master')

@section('title', 'All Categories')

@section('content')

<div class="row">
  <div class="col-md-6">
    <a class="btn btn-success" href="{{ url('posts') }}">Back to posts</a>
    <div class="page-header">
      <h1>All Categories</h1>
    </div>

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
        @foreach ($categories as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->created_at->diffForHumans() }}</td>
            <td>
              <div class="btn-group">
                <a class="btn btn-default btn-sm" href="{{ route('categories.show', $category->id) }}">View</a>
              </div>
              <div class="btn-group">
                <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $category->id) }}">Edit</a>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="col-md-4 col-md-offset-2">
    <div class="page-header">
      <h1>Create Category</h1>
    </div>

    {!! Form::open(['route' => 'categories.store']) !!}
      <div class="form-group">
        {{ Form::label('name', "Category :") }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
      </div>
      <div class="btn-group">
        {{ Form::submit('Create', array('class' => 'btn btn-success')) }}
      </div>
    {!! Form::close() !!}
  </div>
</div>

@stop
