<div class="d-flex justify-content-center">
    <div class="form-container">
        <div class="py-2">
            <div class="row">
                <div class="col-8">
                    <input id="abordados" type="text" wire:model.live="abordados"
                    class="form-control" placeholder="Personas abordadas" disabled>
                    @error('abordados')
                        <div id="abordados" class="text-invalid">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
                <div class="col-4 d-flex justify-content-around">
                    <button wire:click="" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <button wire:click="" class="btn btn-danger">
                        <i class="fa-solid fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- VENTAS -->
            <hr>
            <div class="row">
                <div class="text-center bold">VENTAS</div>
                <div class="col-4">
                    <div class="form-group text-center">
                        <label for="interes_inicial" class="bold label-ventas">Inter&eacute;s inicial</label>
                        <select id="interes_inicial" wire:model.live="interes_inicial" class="form-control">
                            <option value="" class="text-center">🔽</option>
                            @foreach ($combustibles as $combustible)
                                <option value="{{ $combustible->id }}">{{ $combustible->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('interes_inicial')
                            <div id="interes_inicial" class="text-invalid">
                                {{ $message }}
                            </div>   
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group text-center">
                        <label for="interes_final" class="bold label-ventas">Inter&eacute;s final</label>
                        <select id="interes_final" wire:model.lazy="interes_final" class="form-control">
                            <option value="" class="text-center">🔽</option>
                            @foreach ($combustibles as $combustible)
                                <option value="{{ $combustible->id }}">{{ $combustible->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('interes_final')
                            <div id="interes_final" class="text-invalid">
                                {{ $message }}
                            </div>   
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group text-center">
                        <label for="presentacion" class="bold label-ventas">Presentaci&oacute;n</label>
                        <select id="presentacion" wire:model.lazy="presentacion" class="form-control">
                            <option value="" class="text-center">🔽</option>
                            <option value="1 Stick">1 Stick</option>
                            <option value="10s">10s</option>
                            <option value="18s">18s</option>
                            <option value="20s">20s</option>
                        </select>
                        @error('presentacion')
                            <div id="presentacion" class="text-invalid">
                                {{ $message }}
                            </div>   
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
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
                <div class="col-4">
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
                <div class="col-4">
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
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <button wire:click="storeVenta" class="btn btn-primary">Añadir venta</button>
                </div>
            </div> 
            <div class="row mt-2">
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Presentaci&oacute;n</th>
                                <th>G&eacute;nero</th>
                                <th>Edad</th>
                                <th>Cantidad</th>
                                <th>acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ventas as $venta)
                                <tr>
                                    <td>{{ $venta->producto_final->descripcion }}</td>   
                                    <td>{{ $venta->presentacion }}</td>   
                                    <td>{{ $venta->genero }}</td>   
                                    <td>{{ $venta->edad }}</td>   
                                    <td>{{ $venta->cantidad }}</td>   
                                    <td>
                                        <button wire:click="deleteVenta({{ $venta->id }})" class="btn btn-danger">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </td>   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- --- -->
            <hr>
            <!-- GIFUS -->
            <div class="row">
                <div class="text-center bold">GIFUS</div>
                <div class="col-4">
                    <div class="form-group text-center">
                        <label for="producto_gifu" class="bold label-ventas">Producto</label>
                        <select id="producto_gifu" wire:model="producto_gifu" class="form-control">
                            <option value="" class="text-center">🔽</option>
                            @foreach ($dispositivos as $dispositivo)
                                <option value="{{ $dispositivo->id }}">{{ $dispositivo->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('producto_gifu')
                            <div id="producto_gifu" class="text-invalid">
                                {{ $message }}
                            </div>   
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group text-center">
                        <label for="genero_gifu" class="bold label-ventas">G&eacute;nero</label>
                        <select id="genero_gifu" wire:model="genero_gifu" class="form-control">
                            <option value="" class="text-center">🔽</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                        @error('genero_gifu')
                            <div id="genero_gifu" class="text-invalid">
                                {{ $message }}
                            </div>   
                        @enderror
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group text-center">
                        <label for="edad_gifu" class="bold label-ventas">Edad</label>
                        <select id="edad_gifu" wire:model="edad_gifu" class="form-control">
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
                        @error('edad_gifu')
                            <div id="edad_gifu" class="text-invalid">
                                {{ $message }}
                            </div>   
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-4">
                    <button wire:click="storeGifu" class="btn btn-primary">Añadir gifu</button>
                </div>
            </div> 
            <div class="row mt-2">
                <div class="col-md-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>G&eacute;nero</th>
                                <th>Edad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gifus as $gifu)
                                <tr>
                                    <td>{{ $gifu->producto->descripcion }}</td>   
                                    <td>{{ $gifu->genero }}</td>   
                                    <td>{{ $gifu->edad }}</td>   
                                    <td>
                                        <button wire:click="deleteGifu({{ $gifu->id }})" class="btn btn-danger">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </td>   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- -- -->
            <hr>
            <!-- LEADS -->
            <div class="row">
                <div class="text-center bold">LEADS</div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="preventa_iluma" class="bold label-ventas">Preventa Iluma</label>
                        <input id="preventa_iluma" type="number" wire:model.live="preventa_iluma"
                        class="form-control">
                        @error('preventa_iluma')
                            <div id="preventa_iluma" class="text-invalid">
                                {{ $message }}
                            </div>   
                        @enderror
                    </div>
                </div>
            </div>
            <!-- -- -->

            <div class="row gy-2 mt-2">
                <div class="col-md-12">
                    <button wire:click="store"
                    wire:confirm="¿Deseas enviar el módulo Ejecución de la Actividad?"
                    class="btn btn-primary w-100">ENVIAR</button>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-secondary w-100">VOLVER</button>
                </div>
            </div>
        </div>
    </div>
</div>
 