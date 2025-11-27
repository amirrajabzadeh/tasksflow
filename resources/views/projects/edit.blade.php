@extends('layout.app')

@section('content')

    <div class="ui container" style="margin-top: 40px;">

        <h2 class="ui header">
            <i class="edit icon"></i>
            <div class="content">
                Edit Project
                <div class="sub header">Modify the project details</div>
            </div>
        </h2>

        <form class="ui form {{$errors->any()?'error':''}}" method="POST" action="{{ route('projects.update', $project->id) }}">
            @csrf
            @method('PUT')

            @if($errors->any())
                <div class="ui error message">
                    <ul class="list">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="field">
                <label>Name</label>
                <input type="text" name="name" value="{{ $project->name }}">
            </div>

            <div class="field">
                <label>Description</label>
                <textarea name="description" rows="4">{{ $project->description }}</textarea>
            </div>

            <div class="field">
                <label>Status</label>
                <select class="ui dropdown" name="status">
                    <option value="open" {{ $project->status == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ $project->status == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <button class="ui orange button" type="submit">
                <i class="save icon"></i>
                Update Project
            </button>

            <a href="{{ route('projects.index') }}" class="ui button">
                <i class="arrow left icon"></i>
                Back
            </a>
        </form>

    </div>

@endsection
