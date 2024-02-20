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
                                id="foto_cierre" accept="image/*" capture="user"/><br/>
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
    @script
    <script>
        const MAX_WIDTH = 720;
        const MAX_HEIGHT = 580;
        const MIME_TYPE = "image/jpeg";
        const QUALITY = .8;

        const selfie_pdv = document.getElementById("foto_cierre");

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
                    upload_foto_cierre(blob);
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

        function upload_foto_cierre(file){
            $wire.upload('foto_cierre', file, (uploadedFilename) => {})
        }
    </script>
    @endscript
</div>
 