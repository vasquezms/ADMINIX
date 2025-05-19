{{-- filepath: resources/views/roles/create.blade.php --}}
@extends('layouts.main')

@section('title', 'Crear Rol')
@section('header', 'Crear Rol')

@section('content')
    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label"><strong>Nombre del rol:</strong></label>
            <input type="text" name="name" id="name" class="form-control" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver al listado</a>
    </form>
@endsection