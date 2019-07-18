<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use Session;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  $todos = Todo::orderBy('id', 'desc')->get();
      $todos = Todo::orderBy('id', 'desc')->paginate(3);
       return view('todos.index')->with('savedTodos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
          'todoName' => 'required|min:3',
        ]);

        Todo::create($data);
        Session::flash('success', 'Todo successfully added');
        return back();
        //return redirect()->route('todos.index');
        // return view('todos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit')->with('todoToEdit', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'updatedTodo' => 'required|min:3|max:50'
        ]);
      
        $todo = Todo::find($id);
        $todo->todoName = $request->updatedTodo;
        $todo->save();

        Session::flash('success', 'Todo - ' . $id . ' updated');

        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $todo = Todo::find($id);
      $todo->delete();

      Session::flash('success', 'Todo - ' . $id . ' deleted');
      return back();
    }
}
