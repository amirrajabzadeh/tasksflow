@extends('layout.app')

@section('content')

    <div class="ui container" style="margin-top: 40px;">

        <h2 class="ui header">
            <i class="plus icon"></i>
            <div class="content">
                Create New Project
                <div class="sub header">Fill the form to create a project</div>
            </div>
        </h2>

        <form class="ui form {{$errors->any()?'error':''}}" method="POST" action="{{ route('projects.store') }}">
            @csrf

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
                <input type="text" name="name" placeholder="Project Name" value="{{ old('name') }}">
            </div>

            <div class="field">
                <label>Description</label>
                <textarea name="description" rows="4" placeholder="Describe the project">{{ old('description') }}</textarea>
            </div>

            <div class="field">
                <label>Status</label>
                <select class="ui dropdown" name="status">
                    <option value="open" {{ old('status') == 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
            </div>

            <button class="ui teal button" type="submit">
                <i class="save icon"></i>
                Save Project
            </button>

            <a href="{{ route('projects.index') }}" class="ui button">
                <i class="arrow left icon"></i>
                Back
            </a>
        </form>

    </div>

@endsection
