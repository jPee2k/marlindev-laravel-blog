<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->where('status', '1')->paginate(3);

        return view('page.post.list', compact('posts', 'tag'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->where('status', '1')->paginate(3);

        return view('page.post.list', compact('posts', 'category'));
    }

    public function about()
    {
        return view('page.about');
    }
}
