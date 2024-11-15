<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kölcsönzések</title>
</head>
<body>
    <h1>Kölcsönzések</h1>

    @if($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}<br> 
        @endforeach
    @endif

    @if (session('success'))
        {{session('success')}}
    @endif

    <form action="{{ route('rents.update') }}" method="post">
        @csrf
        @method('PUT')
        <table border="1">
            <tr>
                <th>Film címe</th>
                <th>Film szerzője</th>
                <th>Kölcsönzés dátuma</th>
                <th>Visszaadás dátuma</th>
                <th>Adatok mentése</th>
            </tr>
            <tr>
                @foreach ($rents as $rent)
                    <td>{{ $rent->movie->title }}</td>
                    <td>{{ $rent->movie->director }}</td>
                    <td>{{ $rent->rent_date }}</td>
                    <td><input type="date" name="return_date[{{ $rent->id }}]" value="{{ $rent->return_date }}"></td>
                    <td><button type="submit" name="rent_id[]">Adatok mentése</button></td>
                @endforeach
            </tr>
        </table>
    </form>
</body>
</html>
