@extends('layouts.app')
    @section('styles')
        {{ asset('css/styles.css') }}
    @endsection
    @section('href')
        href="{{ route('lista') }}"
    @endsection
    @section('title')
        DETALLES
    @endsection
    @section('content')
        @livewire('Admin.edit', ['ejecucion_id' => $ejecucion_id])
    @endsection