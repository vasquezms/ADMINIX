@extends('layouts.layout')

@section('title', 'Inventario')

@section('content')
<a href="{{ route('dashboard') }}" class="btn btn-secondary">← Regresar al Dashboard</a>
    <h2>Sección de Inventario</h2>
    <p>Aquí puedes gestionar el inventario de tu negocio.</p>
@endsection