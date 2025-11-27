@extends('layout.app')

@section('content')
    <div class="ui container">

        <h2 class="ui header">
            <i class="info circle icon"></i>
            <div class="content">
                Task Details
                <div class="sub header">Full information about the task</div>
            </div>
        </h2>

        <div class="ui segments">

            <div class="ui segment">
                <h3 class="ui header">Basic Information</h3>
                <p><strong>Title:</strong> {{ $task->title }}</p>
                <p><strong>Description:</strong> {{ $task->description ?: 'No description' }}</p>
            </div>

            <div class="ui segment">
                <h3 class="ui header">Project</h3>
                <p>
                    <strong>Project:</strong>
                    {{ $task->project->name }}
                </p>
            </div>

            <div class="ui segment">
                <h3 class="ui header">Assigned User</h3>
                <p>
                    <strong>User:</strong> {{ $task->user->name }}
                    <br>
                    <strong>Role:</strong> {{ ucfirst($task->user->role) }}
                </p>
            </div>

            <div class="ui segment">
                <h3 class="ui header">Status</h3>

                <div class="ui label
                @if($task->status == 'todo') grey
                @elseif($task->status == 'doing') blue
                @else green
                @endif">
                    {{ strtoupper($task->status) }}
                </div>
            </div>
        </div>

        <div class="ui buttons">
            <a href="{{ route('tasks.edit', $task->id) }}" class="ui teal button">
                <i class="edit icon"></i> Edit
            </a>

            <a href="{{ route('tasks.index') }}" class="ui button">
                <i class="arrow left icon"></i> Back
            </a>

        </div>

    </div>
@endsection
