<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gifus</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td style="font-weight: bold">id</td>
                <td style="font-weight: bold">ventas_abordaje_id</td>
                <td style="font-weight: bold">producto_id</td>
                <td style="font-weight: bold">genero</td>
                <td style="font-weight: bold">edad</td>
                <td style="font-weight: bold">created_at</td>
                <td style="font-weight: bold">updated_at</td> 
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $gifu)
            <tr>
                <td>{{ $gifu->id }}</td>
                <td>{{ $gifu->ventas_abordaje_id }}</td>
                <td>{{ $gifu->producto_id }}</td>
                <td>{{ $gifu->genero }}</td>
                <td>{{ $gifu->edad }}</td>
                <td>{{ $gifu->created_at }}</td>
                <td>{{ $gifu->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 