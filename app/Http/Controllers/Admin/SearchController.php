<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\User;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $term = $request->get('q');

        if (!$term) {
            return redirect()->back();
        }

        $posts = Post::where([
            ['status', 1],
            ['title', 'ilike', "%{$term}%"]
        ])->orderByDesc('date')->get();

        $categories = Category::where([
            ['title', 'ilike', "%{$term}%"]
        ])->orderByDesc('updated_at')->get();

        $users = User::where('name', 'ilike', "%{$term}%")
            ->orWhere('email', 'ilike', "%{$term}%")
            ->orderByDesc('id')->get();

        return view('admin.search.index', compact('term', 'posts', 'categories', 'users'));
    }
}
