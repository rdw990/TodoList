@extends('layouts.master')

@section('content')

  <h1>Todo List</h1>

  <form action="{{ route('todos.store')}}" method="POST">
    @csrf
    <input type="text" name="todoName" placeholder="Add a Todo">
    <button >Submit</button>
  </form>

  <hr>

  @if(count($savedTodos) > 0)
    @foreach ($savedTodos as $savedTodo)
    <div>
      <p>{{ $savedTodo->id}} <strong>{{ $savedTodo->todoName}}</strong>  </p>
     

    <a href="{{ route('todos.edit', ['todos'=>$savedTodo->id]) }}">Edit</a>

      <form action="{{ route('todos.destroy', ['todos'=>$savedTodo->id]) }}" method='POST'>
        @csrf
        <input type="hidden" name='_method' value='DELETE' >
        <input type="submit" value='Delete'>
      </form> 

      <hr>
    </div>  	

    @endforeach
  @endif

  <div>
    {{$savedTodos->links()}}    
  </div>

  @endsection