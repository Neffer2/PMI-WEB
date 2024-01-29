<div>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Ejecuci&oacute;n Actividad - {{ $ejecucion->promotor->name }} {{ $ejecucion->promotor->ciudad->description }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Punto de venta</th>
                                <th>Fecha de visita</th>
                                <th>Estrato</th>
                                <th>Barrio</th>
                                <th>Mesaje foco entregado</th>
                                <th>Ubicaci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $ejecucion->punto->descripcion }}</td>
                                <td>{{ $ejecucion->fechaVisita }}</td>
                                <td>{{ $ejecucion->estrato }}</td>
                                <td>{{ $ejecucion->barrio }}</td>
                                <td>
                                    @if ($ejecucion->mensaje_foco)
                                        {{ __('Si.') }}
                                    @else 
                                        {{ __('No.') }}
                                    @endif
                                </td>
                                <td>
                                    <a href="https://www.google.com/maps/?q={{ $ejecucion->ubicacion }}" target="_blank"> 
                                        {{ $ejecucion->ubicacion }}
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @php
                    $selfie_pdv = str_replace('public/', '', $ejecucion->selfie_pdv);    
                    $foto_fachada = str_replace('public/', '', $ejecucion->foto_fachada);    
                    $foto_cierre = str_replace('public/', '', $ejecucion->foto_cierre);    
                @endphp
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset("storage/$selfie_pdv") }}" class="card-img-top" height="200">
                            <div class="card-body">
                                <h5 class="card-title">Selfie punto de venta</h5>
                            </div>
                        </div>
                    </div>    
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset("storage/$foto_fachada") }}" class="card-img-top" height="200">
                            <div class="card-body">
                                <h5 class="card-title">Foto fachada</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ asset("storage/$foto_cierre") }}" class="card-img-top" height="200">
                            <div class="card-body">
                                <h5 class="card-title">Foto Cierre</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="card">
            <div class="card-header">
                <h4>Ventas abordaje</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Personas abordadas</th>
                                <th>Preventa Iluma</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $ejecucion->abordaje->num_abrodadas }}</td>
                                <td>{{ $ejecucion->abordaje->preventa_iluma }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row mt-2">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Ventas</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="max-height: 400px;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Int. inicial</th>
                                                <th>Int. final</th>
                                                <th>Presentaci&oacute;n</th>
                                                <th>G&eacute;nero</th>
                                                <th>Edad</th>
                                                <th>Cantidad</th> 

                                                <th>Gusto marca</th>
                                                <th>Raz&oacute;n gusto marca</th> 

                                                <th>Gusto competencia</th>
                                                <th>Raz&oacute;n gusto competencia</th> 

                                                <th>Mensaje dispositivo</th>
                                                <th>Marca mensaje dispositivo</th>

                                                <th>Mensaje cigarrillos</th>
                                                <th>Marca mensaje cigarrillos</th>

                                                <th>Intervenci&oacute;n alternativas libres de humo</th>
                                                <th>Intervenci&oacute;n diferencia fumar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ejecucion->abordaje->ventas as $venta)
                                                <tr>
                                                    <td>{{ $venta->producto_inicial->descripcion }}</td>
                                                    <td>{{ $venta->producto_final->descripcion }}</td>
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
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Gifus</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive" style="max-height: 400px;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Genero</th>
                                                <th>Edad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($ejecucion->abordaje->gifus as $gifu)
                                                <tr>
                                                    <td>{{ $gifu->producto->descripcion }}</td>
                                                    <td>{{ $gifu->genero }}</td>
                                                    <td>{{ $gifu->edad }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 