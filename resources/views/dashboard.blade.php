@extends('layouts.dashboard')
    @section('styles')
        {{ asset('css/sections.css') }}
    @endsection
    @section('content')
        <div class="row section-container">
            <div class="col-md-6 text-center">
                <a href="{{ route('ejecucion') }}" class="link-mutted">
                    <div class="card section">
                        <div class="card-body">
                            <h2><b>EJECUCI&Oacute;N DE LA ACTIVIDAD</b></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-6 text-center">
                <a href="#" class="link-mutted">
                    <div class="card section">
                        <div class="card-body">
                            <h2><b>VENTAS ABORDAJE</b></h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    @endsection