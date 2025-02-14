<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Tags;
use Auth;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Posts::paginate(10);
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tags::all();
        $categories = Categories::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'categories_id' => 'required',
            'content' => 'required',
            'gambar' => 'required'
        ]);
        
        $gambar = $request->gambar;
        $new_gambar = time().$gambar->getClientOriginalName();

        $post = Posts::create([
            'judul' => $request->judul,
            'categories_id' => $request->categories_id,
            'content' => $request->content,
            'gambar' => 'uploads/post/'.$new_gambar,
            'slug' => Str::slug($request->judul),
            'users_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        $gambar->move('uploads/post', $new_gambar);
        return redirect()->route('post.index')->with('success', 'Postingan Anda Berhasil di Simpan');
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
        $categories = Categories::all();
        $tags = Tags::all();
        $post = Posts::findorfail($id);
        return view('admin.post.edit', compact('post', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'categories_id' => 'required',
            'content' => 'required'
        ]);

        $post = Posts::findorfail($id);

        if ($request->has('gambar')) {  
            $gambar = $request->gambar;
            $new_gambar = time().$gambar->getClientOriginalName();
            $gambar->move('uploads/post', $new_gambar);

        $post_data = [
            'judul' => $request->judul,
            'categories_id' => $request->categories_id,
            'content' => $request->content,
            'gambar' => 'uploads/post/'.$new_gambar,
            'slug' => Str::slug($request->judul)
            ];
    
        }
        else{
        $post_data = [
            'judul' => $request->judul,
            'categories_id' => $request->categories_id,
            'content' => $request->content,
            'slug' => Str::slug($request->judul)
            ];
        }

        $post->tags()->sync($request->tags);
        $post->update($post_data);

        return redirect()->route('post.index')->with('success', 'Postingan Anda Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Posts::findOrfail($id);
        $post->delete();

        return redirect()->back()->with('success', 'Post Berhasil di Hapus (Silahkan Cek Trashed Post)');
    }

    public function tampil_delete()
    {
        $post = Posts::onlyTrashed()->paginate(10);
        
        return view('admin.post.delete', compact('post'));
    }

    public function restore($id)
    {
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->restore();

        return redirect()->back()->with('success', 'Post Berhasil di Hapus (Silahkan Cek List Post');
    }

    public function kill($id)
    {
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->forceDelete();

        return redirect()->back()->with('success', 'Post Berhasil di Hapus Secara Permanen');
    }
}
