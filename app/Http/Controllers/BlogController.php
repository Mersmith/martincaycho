<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Blog::where('activo', true)->latest()->paginate(6);
        return view('web.paginas.blog', compact('posts'));
    }

    public function show($slug)
    {
        $post = Blog::where('slug', $slug)->where('activo', true)->firstOrFail();

        $otrosPosts = Blog::where('activo', true)->latest()
            ->paginate(5);

        return view('web.paginas.blog-item', compact('post', 'otrosPosts'));
    }
}
