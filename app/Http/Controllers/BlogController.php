<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(6);

        return view('blog.home', compact('posts')); 
    }
public function show($id)
{
    $post = Post::findOrFail($id);
    return view('blog.show', compact('post'));
}

}
