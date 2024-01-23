<div>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row gy-2">
            <div class="col-md-6">
                <div class="form-group">
                    <input wire:model.lazy="name" class="form-control" id="name" type="text" name="name"
                    value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Nombre">
                    @error('name')
                        <div id="name" class="text-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input wire:model.lazy="email" class="form-control" id="email" type="email" name="email"
                    value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="Email">
                    @error('email')
                        <div id="email" class="text-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>        
            </div> 
            <div class="col-md-6">
                <div class="form-group">
                    <input wire:model.lazy="password" class="form-control" id="password" type="password" name="password"
                    value="{{ old('password') }}" required autocomplete="new-password" placeholder="Contraseña">
                    @error('password')
                        <div id="password" class="text-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input wire:model.lazy="password_confirmation" class="form-control" id="password_confirmation"type="password"
                    name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="new-password" 
                    placeholder="Confirmar">
                    @error('password_confirmation')
                        <div id="password_confirmation" class="text-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <select wire:model.lazy="ciudad" name="ciudad" id="ciudad" class="form-control">
                        <option value="">Ciudad</option>
                        @foreach ($ciudades as $ciudad)
                            <option value="{{ $ciudad->id }}">{{ $ciudad->description }}</option>
                        @endforeach
                    </select>
                    @error('ciudad')
                        <div id="ciudad" class="text-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <select wire:model.lazy="rol" name="rol" id="rol" class="form-control">
                        <option value="">Rol</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}">{{ $rol->description }}</option>
                        @endforeach
                    </select>
                    @error('rol')
                        <div id="rol" class="text-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <select wire:model.lazy="estado" name="estado" id="estado" class="form-control">
                        <option value="">Estado</option>
                        @foreach ($estados as $estado)
                            <option value="{{ $estado->id }}">{{ $estado->description }}</option>
                        @endforeach
                    </select>
                    @error('estado')
                        <div id="estado" class="text-invalid">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 text-center">
                <div class="form-group">
                    <button class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </form>
</div>
  