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
                                capture="user"/><br/>
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
                                capture="user"/><br/>
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

    @script
    <script>
        const MAX_WIDTH = 720;
        const MAX_HEIGHT = 580;
        const MIME_TYPE = "image/jpeg";
        const QUALITY = .8;

        const selfie_pdv = document.getElementById("selfie_pdv");
        const foto_fachada = document.getElementById("foto_fachada");
        
        selfie_pdv.onchange = function (ev) {
            const file = ev.target.files[0]; // get the file
            const blobURL = URL.createObjectURL(file);
            const img = new Image();
            img.src = blobURL;
            img.onerror = function () {
                URL.revokeObjectURL(this.src);
                // Handle the failure properly
                console.log("Cannot load image");
            };
            img.onload = function () {
                URL.revokeObjectURL(this.src);
                const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
                const canvas = document.createElement("canvas");
                canvas.width = newWidth;
                canvas.height = newHeight;
                const ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0, newWidth, newHeight);
                canvas.toBlob(
                blob => {
                    upload_selfie_pdv(blob);
                },
                MIME_TYPE,
                QUALITY);
            };
        };

        foto_fachada.onchange = function (ev) {
            const file = ev.target.files[0]; // get the file
            const blobURL = URL.createObjectURL(file);
            const img = new Image();
            img.src = blobURL;
            img.onerror = function () {
                URL.revokeObjectURL(this.src);
                // Handle the failure properly
                console.log("Cannot load image");
            };
            img.onload = function () {
                URL.revokeObjectURL(this.src);
                const [newWidth, newHeight] = calculateSize(img, MAX_WIDTH, MAX_HEIGHT);
                const canvas = document.createElement("canvas");
                canvas.width = newWidth;
                canvas.height = newHeight;
                const ctx = canvas.getContext("2d");
                ctx.drawImage(img, 0, 0, newWidth, newHeight);
                canvas.toBlob(
                blob => {
                    upload_foto_fachada(blob);
                },
                MIME_TYPE,
                QUALITY);
            };
        };

        function calculateSize(img, maxWidth, maxHeight) {
            let width = img.width;
            let height = img.height;

            // calculate the width and height, constraining the proportions
            if (width > height) {
                if (width > maxWidth) {
                height = Math.round(height * maxWidth / width);
                width = maxWidth;
                }
            } else {
                if (height > maxHeight) {
                width = Math.round(width * maxHeight / height);
                height = maxHeight;
                }
            }

            return [width, height];
        }

        function upload_selfie_pdv(file){
            $wire.upload('selfie_pdv', file, (uploadedFilename) => {})
        }

        function upload_foto_fachada(file){
            $wire.upload('foto_fachada', file, (uploadedFilename) => {})
        }
    </script>
    @endscript
</div>
 