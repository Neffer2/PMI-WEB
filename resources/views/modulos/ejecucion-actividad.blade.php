@extends('layouts.app')
    @section('styles')
        {{ asset('css/styles.css') }}
    @endsection
    @section('href')
        href="{{ route('home') }}"
    @endsection
    @section('title')
        EJECUCI&Oacute;N DE LA ACTIVIDAD
    @endsection
    @section('content')
        @livewire('modulos.ejecucion')
    @endsection