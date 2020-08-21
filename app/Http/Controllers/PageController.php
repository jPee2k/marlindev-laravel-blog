<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(3);

        return view('page.index', compact('posts'));
    }

    public function about()
    {
        return view('page.about');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        
        return view('page.show', compact('post'));
    }
}
