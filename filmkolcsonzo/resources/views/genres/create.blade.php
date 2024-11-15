<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új műfaj hozzáadása</title>
</head>
<body>
    <h1>Új műfaj hozzáadása</h1>

    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}<br> 
        @endforeach
    @endif

    @if (session('success'))
        {{session('success')}}
    @endif

    <form method="POST" action="{{ route('genres.store') }}">
        @csrf
        <label for="name">Műfaj neve:</label>
        <input type="text" id="name" name="name">
        <button type="submit">Hozzáadás</button>
    </form>
</body>
</html>
