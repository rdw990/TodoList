@extends('layouts.master')

@section('content')

  {{-- @if(Session::has('success'))
  <strong>{{ Session::get('success') }}</strong>
  @endif


  @if (count($errors) > 0)
    <strong>Error:</strong>
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
  @endif --}}

    <form action="{{route('todos.update', [$todoToEdit->id] ) }}" method="POST">
        @csrf
        <input type="hidden" name='_method' value='PUT'>
        <input type="text"  value='{{ $todoToEdit->todoName }}' name='updatedTodo'>
        <input type="submit" value='save'>
        <a href="/todos">return</a>
    </form>

  @endsection