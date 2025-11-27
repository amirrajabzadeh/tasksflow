@extends('layout.app')

@section('content')

    <div class="ui container" style="margin-top: 40px;">

        <a href="{{ route('projects.index') }}" class="ui button">
            <i class="arrow left icon"></i>
            Back to Projects
        </a>

        <div class="ui raised segment">

            <h2 class="ui header">
                <i class="folder icon"></i>
                <div class="content">
                    {{ $project->title }}
                    <div class="sub header">Project Information & Assigned Tasks</div>
                </div>
            </h2>

            <div class="ui divider"></div>

            <div class="ui relaxed list">

                <div class="item">
                    <i class="user icon"></i>
                    <div class="content">
                        <strong>Created by:</strong> {{ $project->user->name }}
                    </div>
                </div>

                <div class="item">
                    <i class="calendar icon"></i>
                    <div class="content">
                        <strong>Created at:</strong> {{ $project->created_at->format('Y-m-d') }}
                    </div>
                </div>

                <div class="item">
                    <i class="info circle icon"></i>
                    <div class="content">
                        <strong>Status:</strong>
                        <div class="ui tiny label {{ $project->status == 'open' ? 'green' : 'grey' }}">
                            {{ ucfirst($project->status) }}
                        </div>
                    </div>
                </div>

            </div>

            <h4 class="ui dividing header">Description</h4>
            <p style="line-height: 1.6;">
                {{ $project->description ?: 'No description available.' }}
            </p>

            <div class="ui divider"></div>

            <h3 class="ui header">
                <i class="tasks icon"></i>
                <div class="content">
                    Tasks
                    <div class="sub header">List of tasks under this project</div>
                </div>
            </h3>

            @if($project->tasks->count() > 0)
                <table class="ui celled table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Assigned To</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($project->tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->user->name ?? '—' }}</td>
                            <td>
                                <div class="ui {{ $task->status == 'completed' ? 'green' : 'orange' }} label">
                                    {{ ucfirst($task->status) }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @else
                <div class="ui message">
                    <div class="header">No tasks found!</div>
                    <p>This project has no tasks yet.</p>
                </div>
            @endif

            <div class="ui divider"></div>

            <!-- Actions -->
            <a href="{{ route('projects.edit', $project->id) }}" class="ui orange button">
                <i class="edit icon"></i>
                Edit Project
            </a>

            <a href="{{ route('projects.index') }}" class="ui button">
                <i class="arrow left icon"></i>
                Back
            </a>

        </div>
    </div>

@endsection
