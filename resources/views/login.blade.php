@extends('layout.guest')
@section('content')

    <div class="ui middle aligned center aligned grid" style="height: 70vh;">
        <div class="column" style="max-width: 450px;">
            <h2 class="ui teal image header">
                <div class="content">Login to your account</div>
            </h2>

            <form class="ui large form {{$errors->any()?'error':''}}" method="POST" action="{{route('login')}}">
                @csrf

                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <button class="ui fluid large teal submit button" type="submit">Login</button>
                </div>


                @if($errors->any())
                    <div class="ui error message">
                        <ul class="list">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </div>

@endsection

