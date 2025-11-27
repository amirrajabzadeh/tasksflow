@extends('layout.app')

@section('content')
    <div class="ui container" style="margin-top: 40px;">

        <h2 class="ui header">
            <i class="plus icon"></i>
            <div class="content">
                Create Task
                <div class="sub header">Add a new task to a project</div>
            </div>
        </h2>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="ui error message">
                <ul class="list">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="ui form" method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <div class="field">
                <label>Task Title</label>
                <input type="text" name="title" placeholder="Enter title" value="{{ old('title') }}" required>
            </div>

            <div class="field">
                <label>Description</label>
                <textarea name="description" placeholder="Task details">{{ old('description') }}</textarea>
            </div>

            <div class="field">
                <label>Project</label>
                <select class="ui dropdown" name="project_id" required>
                    <option value="">Select Project</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label>Assign To User</label>
                <select class="ui dropdown" name="assigned_to" required>
                    <option value="">Select User</option>
                    @foreach($users as $u)
                        <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->role }})</option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label>Status</label>
                <select class="ui dropdown" name="status" required>
                    <option value="pending">Pending</option>
                    <option value="in_progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <button class="ui teal button" type="submit">
                <i class="save icon"></i>
                Create Task
            </button>

            <a href="{{ route('tasks.index') }}" class="ui button">
                <i class="arrow left icon"></i>
                Back
            </a>

        </form>
    </div>

    <script>
        $('.ui.dropdown').dropdown();
    </script>

@endsection
