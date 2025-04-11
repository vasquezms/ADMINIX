@extends('layouts.app')

@section('title', 'Ventas')

@section('header', 'Sección de Ventas')

@section('content')
    <p>Aquí puedes gestionar las ventas de tu negocio.</p>
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">← Regresar al Dashboard</a>
@endsection