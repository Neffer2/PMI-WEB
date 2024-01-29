<div class="d-flex justify-content-center">
    <div class="form-container">
        <div class="py-2">
            <div class="row gy-2 mb-2">
                <div class="col-md-12">                        
                    <div class="photo-box">
                        @if ($foto_cierre) 
                            <img src="{{ $foto_cierre->temporaryUrl() }}" class="photo"> 
                        @else
                            <label for="foto_cierre">
                                Foto cierre 
                                <input id="foto_cierre" type="file" 
                                id="foto_cierre" accept="image/*"
                                wire:model.lazy="foto_cierre" capture="user"/><br/>
                                <span id="imageName"></span>
                            </label>
                        @endif
                    </div>
                    @error('foto_cierre')
                        <div id="foto_cierre" class="text-invalid">
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
                    <button wire:click="cerrar"
                    wire:confirm="¿Deseas enviar el módulo de cierre de punto?"
                    wire:loading.attr="disabled"
                    class="btn btn-primary w-100">ENVIAR</button>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('home') }}" class="btn btn-secondary w-100">VOLVER</a>
                </div>
            </div>
        </div>
    </div>
</div>
 