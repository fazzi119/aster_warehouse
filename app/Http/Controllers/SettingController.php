<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menu.setting.index', [
            'users' => User::latest()->get(),
            'title' => 'Setting Admin',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.setting.create', [
            'users' => User::all(),
            'title' => 'Tambah Admin',
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'roles' => 'required'
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->assignRole($request->roles);

        return redirect('/setting')->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('menu.setting.edit', [
            'user' => $user,
            'roles' => $roles,
            'title' => 'Setting Admin',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'roles' => 'required'
        ]);

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password != null ? bcrypt($request->password) : $user->password,
        ]);

        if ($user->hasRole($request->roles)) {
            $user->removeRole($request->roles);
        } elseif (!$user->hasAnyRole($request->roles)) {
            $user->assignRole($request->roles);
        }

        return redirect('/setting')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('setting')->with('success', 'User deleted successfully');
    }
}
