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
                    <button wire:click="addAbordado" class="btn btn-primary">
                        <i class="fa-solid fa-plus"></i>
                    </button>
                    <button wire:click="subsAbordado" class="btn btn-danger">
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
            <div class="row">
                @if ($interes_inicial && !($combustibles->where('id', $interes_inicial)->first()->competencia))
                    <div class="col-12">
                        <div class="form-group">
                            <label for="gusto_marca" class="bold label-ventas">¿Por qu&eacute; le gusta esta marca?</label> 
                            @if ($gusto_marca != "Otro")
                                <select id="gusto_marca" wire:model.change="gusto_marca" class="form-control">
                                    <option value="">Seleccionar</option>
                                    <option value="Sabor">Sabor</option>
                                    <option value="Precio">Precio</option>
                                    <option value="Disponibilidad">Disponibilidad</option>
                                    <option value="Costumbre">Costumbre</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                @error('gusto_marca')
                                    <div id="gusto_marca" class="text-invalid">
                                        {{ $message }}
                                    </div>   
                                @enderror
                            @else
                                <textarea rows="2" wire:model.change="gusto_marca_otro" class="form-control" placeholder="¿Por qué motivo?"></textarea>
                                @error('gusto_marca_otro')
                                    <div id="gusto_marca_otro" class="text-invalid">
                                        {{ $message }}
                                    </div>   
                                @enderror
                            @endif
                        </div>
                    </div>                    
                @elseif ($interes_inicial && $combustibles->where('id', $interes_inicial)->first()->competencia)
                    <div class="col-12">
                        <div class="form-group">
                            <label for="gusto_marca_competencia" class="bold label-ventas">¿Por qu&eacute; le gusta esta marca por encima de la nuestra?</label>
                            @if ($gusto_marca_competencia != "Otro")
                                <select id="gusto_marca_competencia" class="form-control" wire:model.change="gusto_marca_competencia">
                                    <option value="">Seleccionar</option>
                                    <option value="Sabor">Sabor</option>
                                    <option value="Precio">Precio</option>
                                    <option value="Disponibilidad">Disponibilidad</option>
                                    <option value="Costumbre">Costumbre</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                @error('gusto_marca_competencia')
                                    <div id="gusto_marca_competencia" class="text-invalid">
                                        {{ $message }}
                                    </div>   
                                @enderror
                            @else 
                                <textarea rows="2" wire:model.change="gusto_marca_competencia_otro" class="form-control" placeholder="¿Por qué motivo?"></textarea>
                                @error('gusto_marca_competencia_otro')
                                    <div id="gusto_marca_competencia_otro" class="text-invalid">
                                        {{ $message }}
                                    </div>   
                                @enderror
                            @endif
                        </div>
                    </div>   
                @endif
                <div class="col-12">
                    <div class="form-group">
                        <label for="mesaje_dispositivos_entregado" class="bold label-ventas">¿Se entreg&oacute; mensaje de marca de dispositivos?</label>
                        <select id="mesaje_dispositivos_entregado" wire:model.change="mesaje_dispositivos_entregado" class="form-control">
                            <option value="">Seleccionar</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                        @error('mesaje_dispositivos_entregado')
                            <div id="mesaje_dispositivos_entregado" class="text-invalid">
                                {{ $message }}
                            </div>   
                        @enderror
                    </div>
                </div>
                @if ($mesaje_dispositivos_entregado)
                    <div class="col-12 ps-4">
                        <div class="form-group">
                            <label for="marca_mesaje_dispositivos" class="bold label-ventas">* ¿De que marca?</label>
                            <select id="marca_mesaje_dispositivos" wire:model.change="marca_mesaje_dispositivos" class="form-control">
                                <option value="">Seleccionar</option>
                                <option value="IQOS">IQOS</option>
                                <option value="BONDS">BONDS</option>
                                <option value="AMBAS">AMBAS</option>
                            </select>
                            @error('marca_mesaje_dispositivos')
                                <div id="marca_mesaje_dispositivos" class="text-invalid">
                                    {{ $message }}
                                </div>   
                            @enderror
                        </div>
                    </div>
                @endif
                <div class="col-12">
                    <div class="form-group">
                        <label for="mesaje_cigarrillos_entregado" class="bold label-ventas">¿Se entreg&oacute; mensaje de marca de cigarrillos?</label>
                        <select id="mesaje_cigarrillos_entregado" wire:model.change="mesaje_cigarrillos_entregado" class="form-control">
                            <option value="">Seleccionar</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                        @error('mesaje_cigarrillos_entregado')
                            <div id="mesaje_cigarrillos_entregado" class="text-invalid">
                                {{ $message }}
                            </div>   
                        @enderror
                    </div>
                </div>
                @if ($mesaje_cigarrillos_entregado)
                    <div class="col-12 ps-4">
                        <div class="form-group">
                            <label for="marca_mesaje_cigarrillos" class="bold label-ventas">* ¿De que marca?</label>
                            <select id="marca_mesaje_cigarrillos" wire:model.change="marca_mesaje_cigarrillos" class="form-control">
                                <option value="">Seleccionar</option>
                                <option value="MLB">MARLBORO</option>
                                <option value="L&amp;M">L&amp;M</option>
                                <option value="CHESTERFIELD">CHESTERFIELD</option>
                            </select>
                            @error('marca_mesaje_cigarrillos')
                                <div id="marca_mesaje_cigarrillos" class="text-invalid">
                                    {{ $message }}
                                </div>   
                            @enderror
                        </div>
                    </div>
                @endif
                <div class="col-12">
                    <div class="form-group">
                        <label for="intervencion_alternativas_libres_humo" class="bold label-ventas">
                            Antes de mi intervenci&oacute;n, ¿El consumidor conoc&iacute;a de alternativas libres de humo?
                        </label>
                        <select id="intervencion_alternativas_libres_humo" wire:model.change="intervencion_alternativas_libres_humo" class="form-control">
                            <option value="">Seleccionar</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                        @error('intervencion_alternativas_libres_humo')
                            <div id="intervencion_alternativas_libres_humo" class="text-invalid">
                                {{ $message }}
                            </div>   
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="intervencion_diferencia_fumar" class="bold label-ventas">
                            Antes de mi intervenci&oacute;n, ¿El consumidor sab&iacute; la diferencia entre fumar y usar dispositivos de calentamiendo de tabaco?
                        </label>
                        <select id="intervencion_diferencia_fumar" wire:model.change="intervencion_diferencia_fumar" class="form-control">
                            <option value="">Seleccionar</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                        @error('intervencion_diferencia_fumar')
                            <div id="edad" class="text-invalid">
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
                    <button wire:click="storeVentasAbordaje"
                    wire:confirm="¿Deseas enviar el módulo Ventas Abordaje?"
                    class="btn btn-primary w-100">ENVIAR</button>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('home') }}" class="btn btn-secondary w-100">VOLVER</a>
                </div>
            </div>
        </div>
    </div>
</div>
 