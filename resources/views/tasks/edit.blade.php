@extends('layout.app')

@section('content')
    <div class="ui container">

        <h2 class="ui header">
            <i class="edit icon"></i>
            <div class="content">
                Edit Task
                <div class="sub header">Modify task details</div>
            </div>
        </h2>

        @if ($errors->any())
            <div class="ui error message">
                <ul class="list">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="ui form" method="POST" action="{{ route('tasks.update', $task->id) }}">
            @csrf
            @method('PUT')

            <div class="field">
                <label>Task Title</label>
                <input type="text" name="title" value="{{ $task->title }}" required {{auth()->user()->role=='worker'?'disabled':''}}>
            </div>

            <div class="field">
                <label>Description</label>
                <textarea name="description" {{auth()->user()->role=='worker'?'disabled':''}}>{{ $task->description }}</textarea>
            </div>

            <div class="field">
                <label>Project</label>
                <select class="ui dropdown" name="project_id" required {{auth()->user()->role=='worker'?'disabled':''}}>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ $project->id == $task->project_id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label>Assign To User</label>
                <select class="ui dropdown" name="assigned_to" required {{auth()->user()->role=='worker'?'disabled':''}}>
                    @foreach($users as $u)
                        <option value="{{ $u->id }}" {{ $u->id == $task->assigned_to ? 'selected' : '' }}>
                            {{ $u->name }} ({{ $u->role }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="field">
                <label>Status</label>
                <select class="ui dropdown" name="status" required>
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <button class="ui teal button">
                <i class="save icon"></i>
                Update Task
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
