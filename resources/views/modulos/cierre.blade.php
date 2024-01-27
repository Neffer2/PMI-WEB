@extends('layouts.app')
    @section('styles')
        {{ asset('css/styles.css') }}
    @endsection
    @section('title')
        CIERRE
    @endsection
    @section('content')
        @livewire('modulos.cierre', ['ejecucion_id' => $ejecucion_id])
    @endsection