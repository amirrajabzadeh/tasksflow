@extends('layout.app')
@section('content')



    <div class="ui container" style="margin-top: 40px;">

        <h2 class="ui header">
            <i class="dashboard icon"></i>
            <div class="content">
                Dashboard
                <div class="sub header">Welcome, {{ Auth::user()->name }} ({{ Auth::user()->role }})</div>
            </div>
        </h2>

        <!-- Cards Section -->
        <div class="ui three stackable cards">

            <div class="ui teal card">
                <div class="content">
                    <div class="header">Projects</div>
                    <div class="description">
                        {{ $projects_count }}
                    </div>
                </div>
            </div>

            <div class="ui blue card">
                <div class="content">
                    <div class="header">Tasks</div>
                    <div class="description">
                        {{ $tasks_count }}
                    </div>
                </div>
            </div>

            <div class="ui orange card">
                <div class="content">
                    <div class="header">My Tasks</div>
                    <div class="description">
                        {{ $my_tasks_count }}
                    </div>
                </div>
            </div>

        </div>


        <!-- Latest Projects -->
        <h3 class="ui dividing header" style="margin-top: 40px;">Latest Projects</h3>

        <table class="ui celled table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Owner</th>
                <th>Created at</th>
                <th>Status</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->user->name }}</td>
                    <td>{{ $project->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="ui {{ $project->status == 'open' ? 'green' : 'grey' }} label">
                            {{ ucfirst($project->status) }}
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
