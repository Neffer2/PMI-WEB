<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ventas_abordaje</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td style="font-weight: bold">id</td>
                <td style="font-weight: bold">user_id</td>
                <td style="font-weight: bold">punto_id</td>
                <td style="font-weight: bold">fechaVisita</td>
                <td style="font-weight: bold">estrato</td>
                <td style="font-weight: bold">barrio</td>
                <td style="font-weight: bold">mensaje_foco</td>
                <td style="font-weight: bold">selfie_pdv</td>
                <td style="font-weight: bold">foto_fachada</td>
                <td style="font-weight: bold">ubicacion</td>
                <td style="font-weight: bold">cerrado</td>
                <td style="font-weight: bold">foto_cierre</td>
                <td style="font-weight: bold">created_at</td>
                <td style="font-weight: bold">updated_at</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($ejecuciones as $ejecucion)
            <tr>
                <td>{{ $ejecucion->id }}</td>
                <td>{{ $ejecucion->user_id }}</td>
                <td>{{ $ejecucion->punto_id }}</td>
                <td>{{ $ejecucion->fechaVisita }}</td>
                <td>{{ $ejecucion->estrato }}</td>
                <td>{{ $ejecucion->barrio }}</td>
                <td>{{ $ejecucion->mensaje_foco }}</td>
                <td>{{ $ejecucion->selfie_pdv }}</td>
                <td>{{ $ejecucion->foto_fachada }}</td>
                <td>{{ $ejecucion->ubicacion }}</td>
                <td>{{ $ejecucion->cerrado }}</td>
                <td>{{ $ejecucion->foto_cierre }}</td>
                <td>{{ $ejecucion->created_at }}</td>
                <td>{{ $ejecucion->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 