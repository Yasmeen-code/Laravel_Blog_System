<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'likes'])->latest()->paginate(9);

        return view('blog.home', compact('posts'));
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.show', compact('post'));
    }
    public function like(Post $post)
    {

        if ($post->likes()->where('user_id', Auth::id())->exists()) {
            $post->likes()->where('user_id', Auth::id())->delete();
        } else {
            $post->likes()->create([
                'user_id' => Auth::id(),
            ]);
        }

        return back();
    }
}
