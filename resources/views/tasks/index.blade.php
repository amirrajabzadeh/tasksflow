@extends('layout.app')

@section('content')
    <div class="ui container" style="margin-top: 40px;">
        @if (session('success'))
            <div class="ui positive message">
                <div class="header">
                    Success
                </div>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="ui clearing segment">

            <h2 class="ui header left floated">
                <i class="tasks icon"></i>
                <div class="content">
                    Tasks
                    <div class="sub header">Manage all tasks</div>
                </div>
            </h2>

            @if(in_array(auth()->user()->role,['admin','team_leader']))
                <a href="{{ route('tasks.create') }}" class="ui teal button right floated">
                    <i class="plus icon"></i>
                    New Task
                </a>
            @endif

        </div>

        <table class="ui celled table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Project</th>
                <th>Assigned To</th>
                <th>Status</th>
                <th width="180">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->project->name }}</td>
                    <td>{{ $task->user->name }}</td>

                    <td>
                        <div class="ui label
                        @if($task->status == 'pending') grey
                        @elseif($task->status == 'in_progress') blue
                        @else green
                        @endif">
                            {{ ucfirst($task->status) }}
                        </div>
                    </td>

                    <td>
                        <a href="{{ route('tasks.show', $task->id) }}" class="ui icon button blue">
                            <i class="eye icon"></i>
                        </a>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="ui icon button teal">
                            <i class="edit icon"></i>
                        </a>

                        @if(in_array(auth()->user()->role,['admin','team_leader']))
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="ui icon button red" onclick="return confirm('Delete task?')">
                                    <i class="trash icon"></i>
                                </button>
                            </form>
                        @endif

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
