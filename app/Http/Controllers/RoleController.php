<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:roles,name']);
        Role::create(['name' => $request->name]);
        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente');
    }

    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate(['name' => 'required|unique:roles,name,' . $role->id]);
        $role->update(['name' => $request->name]);
        return redirect()->route('roles.index')->with('success', 'Rol actualizado correctamente');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente');
    }

    public function showAssignUsers(Role $role)
    {
        $users = \App\Models\User::all();
        return view('roles.assign_users', compact('role', 'users'));
    }

    public function assignUsers(Request $request, Role $role)
    {
        $users = \App\Models\User::whereIn('id', $request->users ?? [])->get();
        foreach ($users as $user) {
            $user->syncRoles([$role->name]);
        }
        return redirect()->route('roles.index')->with('success', 'Usuarios asignados al rol correctamente.');
    }
}
