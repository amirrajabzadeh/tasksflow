<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projects=Project::all();
        return view('projects.index',compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }


    public function store(StoreProjectsRequest $request)
    {
        $newProject=new Project($request->validated());

        $newProject->save();
        return redirect()->route('projects.index')->with('success','Project created successfully');
    }


    public function show(string $id)
    {
        $project=Project::find($id);

        return view('projects.show',compact('project'));
    }


    public function edit(string $id)
    {
        $project=Project::find($id);

        return view('projects.edit',compact('project'));
    }


    public function update(UpdateProjectsRequest $request, string $id)
    {
        $project=Project::find($id);
        $project->update($request->validated());
        return redirect()->route('projects.index')->with('success','Project updated successfully');

    }


    public function destroy(string $id)
    {
        Project::find($id)->delete();

        return redirect()->route('projects.index')->with('success','Project deleted successfully');
    }
}
