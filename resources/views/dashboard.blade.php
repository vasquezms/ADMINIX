
@extends('layouts.app')

@section('title', 'Dashboard')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard Principal') }}
    </h2>
@endsection

@section('content')
    <p>¡Bienvenido! Estás autenticado.</p>

    <!-- Opciones de navegación -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-6">
        <x-button href="{{ route('ventas') }}">Ir a Ventas</x-button>
        <x-button href="{{ route('gestionProductos') }}">Ir a gestionProductos</x-button>
        <x-button href="{{ route('inventario') }}">Ir a Inventario</x-button>
        <x-button href="{{ route('users.index') }}" type="btn-secondary">Gestionar Usuarios</x-button>
    </div>
@endsection