<?php

namespace Modules\Blog\app\Http\Controllers;

use Modules\Blog\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderBy('published_at', 'desc')->paginate(1); // Adjust pagination as needed
        return view('blog::index', compact('posts'));
    }

    public function show(BlogPost $post)
    {
        return view('blog::show', compact('post'));
    }
}
