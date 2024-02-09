<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class TaskController extends Controller
{
    /**
     * Display a listing of the users tasks.
     */
    public function index()
    {
        //dd(Auth::id());
        $tasks = Task::where('user_id',Auth::id())->get();
         return view('tasks.index', ['tasks'=>$tasks]);
    }

    /**
     * Store a newly created task in storage.

     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'description' => 'required',
        //     'due_date' =>'required|date|after:now'
        //   ]);
          
        // $request->merge([
        // 'user_id' => Auth::id(),
        // ]);
        // dd($request->all());
        $task =  Task::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'due_date'=>$request->due_date,
            'user_id' => Auth::id(),
            'category'=>$request->category
        ]);
        $task->save();
        // dd($task);
       
        return redirect()->route('tasks.index')
        ->with('success','Task created successfully.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' =>'required|date|after:yesterday'
          ]);
        $task = Task::find($id);
        $task->update($request->all());
        return redirect()->route('tasks.index')
      ->with('success', 'Task updated successfully.');
    }
    // routes functions
  /**
   * Show the form for creating a new task.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $categories = Category::all();
    return view('tasks.create',['categories'=>$categories]);
  }
  /**
   * Display the specified task.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $task = Task::find($id);
    $categories = Category::all();
    return view('tasks.show', ['task'=>$task,'categories'=>$categories]);
  }
  /**
   * Show the form for editing the specified task.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $task = Task::find($id);
    $categories = Category::all();
    return view('tasks.edit', ['task'=>$task,'categories'=>$categories]);
  }
    /**
     * Remove the specified task from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('tasks.index')
      ->with('success', 'Task deleted.');
    }
}
