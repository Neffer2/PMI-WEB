<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td style="font-weight: bold">id</td>
                <td style="font-weight: bold">ventas_abordaje_id</td>
                <td style="font-weight: bold">interes_inicial</td>
                <td style="font-weight: bold">interes_final</td>
                <td style="font-weight: bold">presentacion</td>
                <td style="font-weight: bold">genero</td>
                <td style="font-weight: bold">edad</td>
                <td style="font-weight: bold">cantidad</td>
                <td style="font-weight: bold">gusto_marca</td>
                <td style="font-weight: bold">razon_gusto_marca</td>
                <td style="font-weight: bold">gusto_marca_competencia</td>
                <td style="font-weight: bold">razon_gusto_marca_competencia</td>
                <td style="font-weight: bold">mesaje_dispositivos_entregado</td>
                <td style="font-weight: bold">marca_mesaje_dispositivos</td>
                <td style="font-weight: bold">mesaje_cigarrillos_entregado</td>
                <td style="font-weight: bold">marca_mesaje_cigarrillos</td>
                <td style="font-weight: bold">intervencion_alternativas_libres_humo</td>
                <td style="font-weight: bold">intervencion_diferencia_fumar</td>
                <td style="font-weight: bold">created_at</td>
                <td style="font-weight: bold">updated_at</td> 
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $venta)
            <tr>
                <td>{{ $venta->id }}</td>
                <td>{{ $venta->ventas_abordaje_id }}</td>
                <td>{{ $venta->interes_inicial }}</td>
                <td>{{ $venta->interes_final }}</td>
                <td>{{ $venta->presentacion }}</td>
                <td>{{ $venta->genero }}</td>
                <td>{{ $venta->edad }}</td>
                <td>{{ $venta->cantidad }}</td>
                <td>{{ $venta->gusto_marca }}</td>
                <td>{{ $venta->razon_gusto_marca }}</td>
                <td>{{ $venta->gusto_marca_competencia }}</td>
                <td>{{ $venta->razon_gusto_marca_competencia }}</td>
                <td>{{ $venta->mesaje_dispositivos_entregado }}</td>
                <td>{{ $venta->marca_mesaje_dispositivos }}</td>
                <td>{{ $venta->mesaje_cigarrillos_entregado }}</td>
                <td>{{ $venta->marca_mesaje_cigarrillos }}</td>
                <td>{{ $venta->intervencion_alternativas_libres_humo }}</td>
                <td>{{ $venta->intervencion_diferencia_fumar }}</td>
                <td>{{ $venta->created_at }}</td>
                <td>{{ $venta->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 