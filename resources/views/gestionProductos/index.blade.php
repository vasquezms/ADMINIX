@extends('layouts.layout')

@section('title', 'GestionProductos')

@section('content')
<a href="{{ route('dashboard') }}" class="btn btn-secondary">← Regresar al Dashboard</a>
    <h2>Sección de Gestion de productos</h2>
    <p>Aquí puedes gestionar los productos de tu negocio.</p>
@endsection