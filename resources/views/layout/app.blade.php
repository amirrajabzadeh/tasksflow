<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks Flow</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css"/>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js">
    </script>
</head>
<body>
<div class="ui vertical inverted sidebar menu visible" style="width: 260px;">

    <!-- User Info -->
    <div class="item">
        <div class="ui small image" style="margin-bottom: 10px;">
            <img src="https://cdn-icons-png.flaticon.com/512/3781/3781986.png" alt="User">
        </div>

        <div class="content" style="color: #fff;">
            <div class="header" style="font-size: 1.1em;">
                {{ Auth::user()->name ?? 'User Name' }}
            </div>

            <div class="meta" style="opacity: 0.8; font-size: 0.9em;">
                {{ Auth::user()->email ?? 'user@example.com' }}
            </div>

            <div class="meta" style="opacity: 0.8; font-size: 0.9em; margin-top: 3px;">
                Role: <strong>{{ Auth::user()->role ?? 'User' }}</strong>
            </div>
        </div>
    </div>


    <!-- Menu Items -->
    <a class="item" href="{{route('dashboard.index')}}">
        <i class="home icon"></i>
        Dashboard
    </a>
    @if(in_array(auth()->user()->role,['admin','team_leader']))
        <a class="item" href="{{route('projects.index')}}">
            <i class="block layout icon"></i>
            Projects
        </a>
    @endif

    <a class="item" href="{{route('tasks.index')}}">
        <i class="tasks icon"></i>
        Tasks
    </a>

    @if(in_array(auth()->user()->role,['admin','team_leader']))
        <a class="item">
            <i class="users icon"></i>
            Teams
        </a>

        <a class="item">
            <i class="chart bar icon"></i>
            Reports
        </a>

        <a class="item">
            <i class="settings icon"></i>
            Settings
        </a>
    @endif

    <a class="item" href="{{route('logout')}}">
        <i class="sign-out icon"></i>
        Logout
    </a>

</div>

@yield('content')
</body>
</html>
