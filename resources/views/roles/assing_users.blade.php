@extends('layouts.main')

@section('title', 'Asignar Usuarios a Rol')
@section('header', 'Asignar Usuarios a Rol')

@section('content')
    <h3>Asignar usuarios al rol: {{ $role->name }}</h3>
    <form action="{{ route('roles.assignUsers', $role) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="users">Selecciona usuarios:</label>
            <select name="users[]" id="users" class="form-control" multiple>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Asignar</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
    </form>
@endsection