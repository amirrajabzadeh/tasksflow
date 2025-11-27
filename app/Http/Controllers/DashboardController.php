<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function login(request $request)
    {
        $credentials=$request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
        ]);

        $user=User::query()->where('email',$request->email)->first();

        if (!$user || !Hash::check($request->input('password'),$user->password)) {
            return back()->withErrors([
                'error'=>'The provided credentials do not match our records.',
            ]);
        }

        Auth::login($user);
        $request->session()->regenerate();
        return redirect('/dashboard');
    }

    public function logOut()
    {
        Auth::logout();
        return redirect('/');
    }

    public function index()
    {
        $user=auth()->user();

        return view('dashboard',[
            'projects'=>Project::latest()->take(5)->get(),
            'projects_count'=>project::all()->count(),
            'tasks_count'=>Task::all()->count(),
            'my_tasks_count'=>Task::query()->where('tasks.assigned_to',$user->id)->count(),
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
