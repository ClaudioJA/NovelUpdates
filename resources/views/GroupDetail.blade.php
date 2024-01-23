<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $group->name }}</title>
</head>
<body>
    <h1>{{ $group->name }}</h1>

    <table border="1">
        <tr>
            <td colspan="2">Group Info</td>
        </tr>
        
        <tr>
            <td>Group Name :</td>
            <td>{{ $group->name }}</td>
        </tr>

        <tr>
            <td>URL :</td>
            <td><a href="{{ $group->link }}">Link</a></td>
        </tr>

        <tr>
            <td>Follower :</td>
            <td>0</td>
        </tr>

        <tr>
            <td>Series :</td>
            <td>
                @forelse ($novel as $n)
                    <a href="/novel/{{ $n->id }}">{{ $n->title }}</a>
                @empty
                    -
                @endforelse
            </td>
        </tr>

        <tr>
            <td>Releases :</td>
            <td>Link</a></td>
        </tr>
        
    </table>
</body>
</html>