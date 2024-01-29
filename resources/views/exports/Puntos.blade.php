<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Puntos de venta</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td style="font-weight: bold">id</td>
                <td style="font-weight: bold">cod</td>
                <td style="font-weight: bold">descripcion</td>
                <td style="font-weight: bold">ciudad_id</td>
                <td style="font-weight: bold">created_at</td>
                <td style="font-weight: bold">updated_at</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $punto)
            <tr>
                <td>{{ $punto->id }}</td>
                <td>{{ $punto->cod }}</td>
                <td>{{ $punto->descripcion }}</td>
                <td>{{ $punto->ciudad_id }}</td>
                <td>{{ $punto->created_at }}</td>
                <td>{{ $punto->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 