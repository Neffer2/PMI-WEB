@extends('layouts.app')
    @section('styles')
        {{ asset('css/styles.css') }}
    @endsection
    @section('href')
        href="{{ route('home') }}"
    @endsection
    @section('title')
        CIERRE
    @endsection
    @section('content')
        @livewire('modulos.cierre', ['ejecucion_id' => $ejecucion_id, 'user_ip' => $user_ip])
    @endsection