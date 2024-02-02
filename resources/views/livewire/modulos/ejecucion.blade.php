<div class="d-flex justify-content-center">
    <div class="form-container">
        <div class="py-2">
            <div class="row">
                <div class="col-md-6">
                    <label for="punto">Punto de venta:</label>
                    <select id="punto" wire:model.live="punto" class="form-control">
                        <option value="">Seleccionar</option>
                        @foreach ($puntos as $punto_)
                            <option value="{{ $punto_->id }}">{{ $punto_->descripcion }}</option>
                        @endforeach
                        <option value="Otro">Otro</option>
                    </select>
                    @error('punto')
                        <div id="punto" class="text-invalid">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="fecha">Fecha de la visita:</label>
                    <input id="fecha" type="date" wire:model.lazy="fecha" class="form-control" >
                    @error('fecha')
                        <div id="fecha" class="text-invalid">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
            </div>
            @if($punto == "Otro")
                <div class="row gy-2 my-1">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control"
                            placeholder="C&oacute;digo del punto" wire:model.lazy="cod">
                        </div>
                        @error('cod')
                            <div id="cod" class="text-invalid">
                                {{ $message }}
                            </div>   
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" class="form-control" 
                            placeholder="Nombre del punto" wire:model.lazy="punto_nom">
                        </div>
                        @error('punto_nom')
                            <div id="punto_nom" class="text-invalid">
                                {{ $message }}
                            </div>   
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <button wire:click="newPunto" class="btn btn-primary">Crear punto</button>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <label for="estrato">Estrato:</label>
                    <select id="estrato" wire:model.lazy="estrato" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="5">6</option>
                    </select>
                    @error('estrato')
                        <div id="estrato" class="text-invalid">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="barrio">Barrio:</label>
                    <input type="text" wire:model.lazy="barrio" class="form-control">
                    @error('barrio')
                        <div id="barrio" class="text-invalid">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-12">
                    <label for="marca_foco">¿Estaba agotada la marca foco CCs?</label>
                    <select id="marca_foco" wire:model.lazy="marca_foco" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="1">Si.</option>
                        <option value="0">No.</option>
                    </select>
                    @error('marca_foco')
                        <div id="marca_foco" class="text-invalid">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
            </div>
            <div class="row mb-2 gy-2">
                <div class="col-md-12">                        
                    <div class="photo-box">
                        @if ($selfie_pdv) 
                            <img src="{{ $selfie_pdv->temporaryUrl() }}" class="photo"> 
                        @else
                            <label for="selfie_pdv">
                                Selfie Punto de Venta
                                <input id="selfie_pdv" type="file" 
                                id="selfie_pdv" accept="image/*"
                                wire:model.lazy="selfie_pdv" capture="user"/><br/>
                                <span id="imageName"></span>
                            </label>
                        @endif
                    </div>
                    @error('selfie_pdv')
                        <div id="selfie_pdv" class="text-invalid">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
                <div class="col-md-12">
                    <div class="photo-box">
                        @if ($foto_fachada) 
                            <img src="{{ $foto_fachada->temporaryUrl() }}" class="photo">
                        @else
                            <label for="foto_fachada">
                                Foto Fachada
                                <input id="foto_fachada" type="file"
                                id="foto_fachada" accept="image/*"
                                wire:model="foto_fachada" capture="user"/><br/>
                                <span id="imageName"></span>
                            </label>
                        @endif
                    </div>
                    @error('foto_fachada')
                        <div id="foto_fachada" class="text-invalid">
                            {{ $message }}
                        </div>   
                    @enderror
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-12 d-flex justify-content-center">
                    <div wire:loading> 
                        <div class="spinner-grow text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-dark" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-dark" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="spinner-grow text-dark" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gy-2">
                <div class="col-md-12">
                    <button wire:loading.attr="disabled" 
                    wire:click="store"
                    wire:confirm="¿Deseas enviar el módulo Ejecución de la Actividad?"
                    class="btn btn-primary w-100">ENVIAR</button>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('home') }}" class="btn btn-secondary w-100">VOLVER</a>
                </div>
            </div>
        </div>
    </div>
</div>
 