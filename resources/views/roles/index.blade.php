{{-- filepath: resources/views/roles/index.blade.php --}}
@extends('layouts.main')

@section('title', 'Lista de Roles')
@section('header', 'Lista de Roles')

@section('content')
    <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Crear nuevo rol</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning btn-sm">Editar</a>
                    <a href="{{ route('roles.showAssignUsers', $role) }}" class="btn btn-info btn-sm">Asignar usuarios</a>
                    <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este rol?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection