<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Task;
class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('welcome', compact('user'));
    }
    public function add()
    {
        return view('add', compact('user'));
    }
    public function tasks(){
      if( Auth::check()){
        $user = Auth::user();
        // $tasks = Task::all(); 모두 출력
        $tasks = Task::where('user_id',$user->id)->get();
        return $tasks;
      }else {
        return [];
      }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $task = new Task();
      $task->description = $request->description;
      if($task->description == null || $task->description ==""){
          echo "<script>alert('글을 입력하세요');</script>";
          return redirect('/task');
      }
      $task->user_id = Auth::id();
      $task->save();
      return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id, Request $request)
    {
        $task = Task::findOrFail($id);

        return view("edit", compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
      $task->description = $request->description;
      if($task->description == null || $task->description ==""){
          echo "<script>alert('글을 입력하세요');</script>";
          return view("edit", compact('task'));
      }
      $task->save();
      return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect('/');
    }
}
