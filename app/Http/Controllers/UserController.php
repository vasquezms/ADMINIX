<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todos los usuarios y enviarlos a la vista
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mostrar el formulario para crear un nuevo usuario
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|regex:/^[\w.%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/|unique:users,email',
        'password' => 'required|string|min:8',
    ]);

    // Crear un nuevo usuario
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password), // Encriptar la contraseña
    ]);

    // Redirigir al listado de usuarios con un mensaje de éxito
    return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mostrar un usuario específico
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mostrar el formulario para editar un usuario
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar y actualizar un usuario existente
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Eliminar un usuario
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}