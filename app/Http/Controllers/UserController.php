<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(10);
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'type' => 'required' 
        ]);

        if ($request->input('password')) { 
            $password = bcrypt($request->password);
        } 
        else 
        {
            $password = bcrypt('1234');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' =>  $request->type, 
            'password' => $password
        ]);

        return redirect()->route('user.index')->with('success', 'User Berhasil Disimpan');
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
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'type' => 'required' 
        ]);

        if($request->input('password')) {
            $user_data = [
                'name' => $request->name,
                'type' => $request->type,
                'password' => bcrypt($request->password)
            ];
        }
        else{
            $user_data = [
                'name' => $request->name,
                'type' => $request->type
            ];
        }

        $user = User::find($id);
        $user->update($user_data);

        return redirect()->route('user.index')->with('success', 'Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'User Berhasil Dihapus');
    }
}
