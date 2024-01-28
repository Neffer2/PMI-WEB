@extends('layouts.app')
    @section('styles')
        {{ asset('css/styles.css') }}
    @endsection
    @section('href')
    href="{{ route('lista') }}"
    @endsection
    @section('title')
        LISTA ADMINISTRADOR
    @endsection
    @section('content')
        @livewire('Admin.index')

        <div class="container mt-2">
            <a class="btn btn-primary" href="{{ route('export') }}">Exportar</a>
        </div>
    @endsection