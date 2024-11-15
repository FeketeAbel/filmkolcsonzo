<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film kölcsönzése</title>
</head>
<body>
    <h1>Film kölcsönzése</h1>

    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}<br> 
        @endforeach
    @endif

    @if (session('success'))
        {{session('success')}}
    @endif

    <h2>{{ $movie->title }}</h2>
    <p><strong>Rendező:</strong> {{ $movie->director }}</p>
    <p><strong>Műfaj:</strong> {{ $movie->genre->name }}</p>
    <p><strong>Megjelenés éve:</strong> {{ $movie->release_year }}</p>

    <form method="POST" action="{{ route('rents.store') }}">
        @csrf
        <input type="hidden" name="movie_id" value="{{ $movie->id }}">

        <label for="renter_name">Kölcsönző neve:</label>
        <input type="text" id="renter_name" name="renter_name"><br>

        <label for="rent_date">Kölcsönzés dátuma:</label>
        <input type="date" id="rent_date" name="rent_date"><br>

        <button type="submit">Kölcsönzés</button>
    </form>
</body>
</html>
