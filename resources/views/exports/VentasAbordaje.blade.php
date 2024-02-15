<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas Abordaje</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td style="font-weight: bold">id</td>
                <td style="font-weight: bold">ejecucion_id</td>
                <td style="font-weight: bold">num_abordadas</td>
                <td style="font-weight: bold">preventa_iluma</td>
                <td style="font-weight: bold">created_at</td>
                <td style="font-weight: bold">updated_at</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $ejecucion)
            <tr>
                <td>{{ $ejecucion->abordaje->id }}</td>
                <td>{{ $ejecucion->abordaje->ejecucion_id }}</td>
                <td>{{ $ejecucion->abordaje->num_abrodadas }}</td>
                <td>{{ $ejecucion->abordaje->preventa_iluma }}</td>
                <td>{{ $ejecucion->abordaje->created_at }}</td>
                <td>{{ $ejecucion->abordaje->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 