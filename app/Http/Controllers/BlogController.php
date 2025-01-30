<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Categories;

class BlogController extends Controller
{
    public function index(Posts $posts){
        $categories_widget = Categories::all();
        $data = $posts->latest()->take(8)->get();

        return view('blog', compact('data', 'categories_widget'));
    }

    public function isi_blog($slug){
        $categories_widget = Categories::all();
        $data = Posts::where('slug', $slug)->get();

        return view('blog.isi_post', compact('data', 'categories_widget'));
    }

    public function list_blog(){
        $categories_widget = Categories::all();
        $data = Posts::latest()->paginate(6);
        
        return view('blog.list_post', compact('data', 'categories_widget'));
    }

    public function list_categories(Categories $categories){
        $categories_widget = Categories::all();

        $data = $categories->posts()->paginate(); 
        return view('blog.list_post', compact('data', 'categories_widget'));
    }
    
    public function search(request $request){
        $categories_widget = Categories::all();

        $data = Posts::where('judul', $request->search)
        ->orWhere('judul', 'like', '%'. $request->search .'%')->paginate(6);
            return view('blog.list_post', compact('data', 'categories_widget'));
    }
}
