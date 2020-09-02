<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status', 1)->paginate(3);

        $popularPosts = Post::where('status', 1)->orderBy('views', 'desc')->take(3)->get();
        $featuredPosts = Post::where('status', 1)->where('is_featured', 1)->orderBy('views')->take(3)->get();
        $recentPosts = Post::where('status', 1)->orderBy('date', 'desc')->take(4)->get();

        $categories = Category::all();

        return view('page.post.index', compact(
            'posts',
            'popularPosts',
            'featuredPosts',
            'recentPosts',
            'categories'
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        return view('page.post.show', compact('post'));
    }
}
