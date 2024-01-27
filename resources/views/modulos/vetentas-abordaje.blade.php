@extends('layouts.app')
    @section('styles')
        {{ asset('css/styles.css') }}
    @endsection
    @section('href')
        href="{{ route('home') }}"
    @endsection
    @section('title')
        VENTAS ABORDAJE
    @endsection
    @section('content')
        @livewire('modulos.ventas_abordaje', ['ejecucion_id' => $ejecucion_id])
    @endsection