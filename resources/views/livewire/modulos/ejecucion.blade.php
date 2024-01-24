<div class="d-flex justify-content-center">
    <div class="form-container">
        <div class="py-2">
            <div class="row">
                <div class="col-md-6">
                    <label for="punto">Punto de venta:</label>
                    <select id="punto" wire:model.lazy="punto" class="form-control">
                        <option value="">Seleccionar</option>
                        @foreach ($puntos as $punto)
                            <option value="{{ $punto->id }}">{{ $punto->description }}</option>
                        @endforeach
                        <option value="1">Punto</option>
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
            <div class="row gy-2 mb-2">
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
                                wire:model="foto_fachada" capture="user"
                                x-on:click="isOpen"/><br/>
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
            <div class="row gy-2">
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
 