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
                                                <th>Acciones</th>
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
                                                    <td>
                                                        @if ($allowEdit)
                                                            <button class="btn btn-danger"
                                                            wire:click="eliminarVenta({{ $venta->id }})"
                                                            wire:confirm="¿Estas seguro de elimninar esta venta?">Eliminar</button></td> 
                                                        @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_venta" aria-expanded="false" aria-controls="collapse_venta"> + </button>
                                <div class="row collapse collapse-horizontal" id="collapse_venta">
                                    <div class="col-md-6">
                                        <label for="interes_inicial" class="bold label-ventas">Inter&eacute;s inicial</label>
                                        <select id="interes_inicial" wire:model="interes_inicial" class="form-control">
                                            <option value="" class="text-center">🔽</option>
                                            @foreach ($productos as $producto)                                     
                                                <option value="{{ $producto->id }}">{{ $producto->descripcion }}</option>
                                            @endforeach
                                        </select>
                                        @error('interes_inicial')
                                            <div id="interes_inicial" class="text-invalid">
                                                {{ $message }}
                                            </div>   
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="interes_final" class="bold label-ventas">Inter&eacute;s final</label>
                                        <select id="interes_final" wire:model="interes_final" class="form-control">
                                            <option value="" class="text-center">🔽</option>
                                            @foreach ($productos as $producto)                                     
                                                <option value="{{ $producto->id }}">{{ $producto->descripcion }}</option>
                                            @endforeach
                                        </select>
                                        @error('interes_final')
                                            <div id="interes_final" class="text-invalid">
                                                {{ $message }}
                                            </div>   
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-center">
                                            <label for="presentacion" class="bold label-ventas">Presentaci&oacute;n</label>
                                            <select id="presentacion" wire:model="presentacion" class="form-control">
                                                <option value="" class="text-center">🔽</option>
                                                <option value="1 Stick">1 Stick</option>
                                                <option value="18s">18s</option>                                
                                                <option value="10s">10s</option>
                                                <option value="20s">20s</option>
                                                <option value="X20">X20</option>
                                                <option value="ONE">ONE</option>
                                                <option value="DUO">DUO</option>
                                                <option value="BONDS">BONDS</option>
                                            </select>
                                            @error('presentacion')
                                                <div id="presentacion" class="text-invalid">
                                                    {{ $message }}
                                                </div>   
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-center">
                                            <label for="genero" class="bold label-ventas">G&eacute;nero</label>
                                            <select id="genero" wire:model="genero" class="form-control">
                                                <option value="" class="text-center">🔽</option>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                            @error('genero')
                                                <div id="genero" class="text-invalid">
                                                    {{ $message }}
                                                </div>   
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-center">
                                            <label for="edad" class="bold label-ventas">Edad</label>
                                            <select id="edad" wire:model="edad" class="form-control">
                                                <option value="" class="text-center">🔽</option>
                                                <option value="18-22">18-22</option>
                                                <option value="23-27">23-27</option>
                                                <option value="28-32">28-32</option>
                                                <option value="33-37">33-37</option>
                                                <option value="38-42">38-42</option>
                                                <option value="43-47">43-47</option>
                                                <option value="48-52">48-52</option>
                                                <option value="53">Mas de 52</option>
                                            </select> 
                                            @error('edad')
                                                <div id="edad" class="text-invalid">
                                                    {{ $message }}
                                                </div>   
                                            @enderror 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group text-center">
                                            <label for="cantidad" class="bold label-ventas">Cantidad</label>
                                            <input id="cantidad" type="number" wire:model="cantidad" class="form-control">
                                            @error('cantidad')
                                                <div id="cantidad" class="text-invalid">
                                                    {{ $message }}
                                                </div>   
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mt-2">
                                            @if ($allowEdit)
                                                <button class="btn btn-primary"
                                                wire:click="storeVenta">Crear venta</button>
                                            @endif
                                        </div>
                                    </div>
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

    <div class="container my-4">
        @if ($allowEdit)
            <button class="btn btn-danger" wire:click="deleteRegistro" wire:confirm="¿Estas seguro de elimninar este registro?">Eliminar</button>
        @endif
    </div>
</div>
  