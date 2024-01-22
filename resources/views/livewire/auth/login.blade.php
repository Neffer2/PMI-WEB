<div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input id="email" class="form-control" type="email" name="email" value="email" required autofocus autocomplete="username" wire:model.lazy="email"/>
            @error('email')
                <div id="emial" class="text-invalid">
                    {{ $message }}
                </div>
            @enderror 
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input id="password" class="form-control" type="password" name="password" value="password" required autocomplete="current-password" wire:model.lazy="password"/>
            @error('password')
                <div id="password" class="text-invalid">
                    {{ $message }}
                </div>
            @enderror 
        </div>
        <div class="form-group d-flex justify-content-center">
            <button class="btn btn-primary">Iniciar sesi&oacute;n</button>
        </div> 
    </form>
</div>
 