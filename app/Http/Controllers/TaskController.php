<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        if (in_array(auth()->user()->role,['admin','team_leader'])){
            $tasks=Task::all();
        }
        else{
            $tasks=Task::query()->where('tasks.assigned_to',auth()->user()->id)->get();
        }
        return view('tasks.index',compact('tasks'));
    }


    public function create()
    {
        $projects=Project::all();
        $users=User::all();

        return view('tasks.create',compact('projects','users'));
    }


    public function store(StoreTaskRequest $request)
    {
        $newTask=new Task($request->validated());

        $newTask->save();
        return redirect()->route('tasks.index')->with('success','Task created successfully');
    }


    public function show(string $id)
    {
        $task=Task::find($id);
        return view('tasks.show',compact('task'));
    }


    public function edit(string $id)
    {
        $task=Task::find($id);
        $projects=Project::all();
        $users=User::all();
        return view('tasks.edit',compact('task','projects','users'));
    }


    public function update(UpdateTaskRequest $request, string $id)
    {
        Task::find($id)->update($request->validated());
        return redirect()->route('tasks.index')->with('success','Task updated successfully');
    }


    public function destroy(string $id)
    {
        //
    }

    public function updateStatus($id, Request $request)
    {

    }
}
