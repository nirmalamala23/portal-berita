<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tag = Tags::paginate(10);
        return view('admin.tag.index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20|min:3'
        ]);

        Tags::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('tag.index')->with('success', 'Data Berhasil di Simpan');
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
        $tag = Tags::findorfail($id);

        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:20|min:3'
        ]);

        $tag_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        Tags::whereId($id)->update($tag_data);

        return redirect()->route('tag.index')->with('success', 'Data Sudah di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tags::findorfail($id);
        $tag->delete();

        return redirect()->back()->with('success', 'Data Berhasil di Hapus');
    }
}
