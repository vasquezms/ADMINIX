{{-- filepath: resources/views/roles/edit.blade.php --}}
@extends('layouts.main')

@section('title', 'Editar Rol')
@section('header', 'Editar Rol')

@section('content')
    <form action="{{ route('roles.update', $role) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label"><strong>Nombre del rol:</strong></label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver al listado</a>
    </form>
@endsection