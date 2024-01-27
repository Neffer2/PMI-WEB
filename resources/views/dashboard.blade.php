@extends('layouts.dashboard')
    @section('styles')
        {{ asset('css/sections.css') }}
    @endsection
    @section('content')
        <div class="row section-container">
            <div class="col-md-4 text-center">
                @if (!($lastEjecucion) || $lastEjecucion->cerrado)
                    <a href="{{ route('ejecucion') }}" class="link-mutted">
                        <div class="card section">
                            <div class="card-body"> 
                                <input type="checkbox" disabled class="form-check-input section-check">
                                <h2><b>EJECUCI&Oacute;N DE LA ACTIVIDAD</b></h2>
                            </div>
                        </div>
                    </a>
                @else
                    <a @if (!($lastEjecucion->abordaje)) href="{{ route('ejecucion') }}" @endif class="link-mutted">
                        <div class="card section">
                            <div class="card-body"> 
                                <input type="checkbox" @if ($lastEjecucion && $lastEjecucion->abordaje) checked @endif disabled class="form-check-input section-check">
                                <h2><b>EJECUCI&Oacute;N DE LA ACTIVIDAD</b></h2>
                            </div>
                        </div>
                    </a>
                @endif
            </div>
            <div class="col-md-4 text-center">
                <a @if ($lastEjecucion && !($lastEjecucion->cerrado) && !($lastEjecucion->abordaje->estado)) href="{{ route('ventas', $lastEjecucion) }}" @endif class="link-mutted">
                    <div class="card section">
                        <div class="card-body">
                            <input type="checkbox" @if ($lastEjecucion && !($lastEjecucion->cerrado) && $lastEjecucion->abordaje->estado) checked @endif disabled class="form-check-input section-check">
                            <h2><b>VENTAS ABORDAJE</b></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4 text-center">
                <a @if ($lastEjecucion && !($lastEjecucion->cerrado) && $lastEjecucion->abordaje->estado) href="{{ route('cierre', $lastEjecucion) }}" @endif class="link-mutted">
                    <div class="card section">
                        <div class="card-body">
                            <h2><b>CIERRE</b></h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endsection