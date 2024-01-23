<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $novel->title }}</title>
</head>
<body>
    <h1>{{ $novel->title }}</h1>
    <h4>By {{ $novel->author }}</h4>
    <h3>Alternative Title : {{ $novel->alternative_title }}</h3>
    <h3>Type : {{ $novel->type }}</h3>
    <h3>Desc :</h3>
    <p>{{ $novel->desc }}</p>
    <h3>Genre :</h3>
    @foreach ($genre as $g)
        <a href="/genre/{{ $g->id }}">{{ $g->name }}</a>
    @endforeach

    <br><br>

    <table border="1">
        <tr>
            <th>Date</th>
            <th>Group</th>
            <th>Release</th>
        </tr>

        @foreach ($chapter as $index => $c)
            <tr>
                <td>{{ $c->created_at->format('Y/m/d') }}</td>
                <td><a href="/group/{{ $group[$index]->id }}">{{ $group[$index]->name }}</td>
                <td><a href="{{ $c->link }}">{{ $c->number }}</a></td>
            </tr>
        @endforeach
    </table>

</body>
</html>