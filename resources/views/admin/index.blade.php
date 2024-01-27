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
    @endsection