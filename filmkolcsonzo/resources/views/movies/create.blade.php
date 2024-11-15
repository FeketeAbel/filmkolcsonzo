<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új film hozzáadása</title>
</head>
<body>
    <h1>Új film hozzáadása</h1>

    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}<br> 
        @endforeach
    @endif

    @if (session('success'))
        {{session('success')}}
    @endif

    <form method="POST" action="{{ route('movies.store') }}">
        @csrf
        <label for="title">Cím:</label>
        <input type="text" id="title" name="title" ><br>

        <label for="director">Rendező:</label>
        <input type="text" id="director" name="director" ><br>

        <label for="genre_id">Műfaj:</label>
        <select id="genre_id" name="genre_id">
            <option value="">Válassz műfajt</option>
            @foreach ($genres as $genre)
                <option value="{{ $genre->id }}">
                    {{ $genre->name }}
                </option>
            @endforeach
        </select><br>

        <label for="release_year">Megjelenés éve:</label>
        <input type="number" id="release_year" name="release_year" ><br>

        <button type="submit">Hozzáadás</button>
    </form>
</body>
</html>
