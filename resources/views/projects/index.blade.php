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
                <i class="folder open icon"></i>
                <div class="content">
                    Projects
                    <div class="sub header">List of all projects</div>
                </div>
            </h2>

            @if(auth()->user()->role == 'admin')
                <a href="{{ route('projects.create') }}" class="ui teal button right floated">
                    <i class="plus icon"></i>
                    New Project
                </a>
            @endif

        </div>


        <!-- Projects Table -->
        <table class="ui celled striped table">
            <thead>
            <tr>
                <th width="35%">Name</th>
                <th width="20%">Owner</th>
                <th width="20%">Created At</th>
                <th width="10%">Status</th>
                <th width="15%">Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>

                    <td>
                        <i class="user icon"></i>
                        {{ $project->user->name }}
                    </td>

                    <td>{{ $project->created_at->format('Y-m-d') }}</td>

                    <td>
                        <div class="ui
                        {{ $project->status === 'open' ? 'green' : 'grey' }}
                        label">
                            {{ ucfirst($project->status) }}
                        </div>
                    </td>

                    <td>

                        <a href="{{ route('projects.show', $project->id) }}"
                           class="ui tiny blue icon button">
                            <i class="eye icon"></i>
                        </a>

                        <a href="{{ route('projects.edit', $project->id) }}"
                           class="ui tiny orange icon button">
                            <i class="edit icon"></i>
                        </a>

                        <form action="{{ route('projects.destroy', $project->id) }}"
                              method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="ui tiny red icon button"
                                    onclick="return confirm('Delete this project?')">
                                <i class="trash icon"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
