<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>
</head>
<body>
    <h1>This is Homepage</h1>

    <div>
        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
        @else
            <a href="{{ route('login') }}">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
    <br>

    {{-- <a href="/userList">Test</a> --}}

    <table border="1">
        <tr>
            <th>Title</th>
            <th>Release</th>
            <th>Group</th>
        </tr>

        @foreach ($data['novels'] as $index => $n)
            <tr>
                <th><a href="/novel/{{ $n->id }}">{{ $n->title }}</a></th>
                <th>
                    @if (optional($n->latestChapter)->link)
                        <a href="{{ $n->latestChapter->link }}">{{ $n->latestChapter->number }}</a>
                    @endif
                </th>
                
                <th>
                    @if (optional($n->latestChapter)->link)
                        <a href="/group/{{ $data['groups'][$index]->id }}">{{ $data['groups'][$index]->name }}</a>
                    @endif
                </th>
            </tr>
        @endforeach
    </table>
    
    
</body>
</html>