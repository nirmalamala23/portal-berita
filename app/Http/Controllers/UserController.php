<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(10);
        $roles = Role::all(); // Mengambil semua data role
        return view('admin.user.index', compact('user','roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all(); // Mengambil semua data role
        return view('admin.user.create', compact('roles'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
        ]);
       
        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
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
        $roles = Role::all(); // Mengambil semua data role
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user','roles'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            
            'role_id' => 'nullable',

        ]);
    
        $user = User::findOrFail($id);
    
        $user_data = [
            'name' => $request->name,
            'role_id' => $request->role_id,
        ];
    
        if ($request->filled('password')) {
            $user_data['password'] = bcrypt($request->password);
        }
    
        $user->update($user_data);
    
        return redirect()->route('user.index')->with('success', 'Berhasil Diupdate');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus');
        }
}
