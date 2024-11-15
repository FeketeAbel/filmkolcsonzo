<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elérhető filmek</title>
</head>
<body>
    <h1>Elérhető filmek</h1>

    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}<br> 
        @endforeach
    @endif

    @if (session('success'))
        {{session('success')}}
    @endif

    <form method="GET" action="{{ route('movies.index') }}">
        <label for="title">Keresés cím alapján:</label>
        <input type="text" id="title" name="title">
        <button type="submit">Keresés</button>
    </form>

    <table border="1">
        <tr>
            <th>Cím</th>
            <th>Rendező</th>
            <th>Műfaj</th>
            <th>Megjelenés éve</th>
            <th>Funkciók</th>
        </tr>
        @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->director }}</td>
                <td>{{ $movie->genre->name }}</td>
                <td>{{ $movie->release_year }}</td>
                <td>
                    <a href="{{ route('movies.show', $movie->id) }}">Kölcsönzés</a>
                    
                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Törlés</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
