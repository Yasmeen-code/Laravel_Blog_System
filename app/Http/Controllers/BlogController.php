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
    public function create(){
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('post.show', $post->id)->with('success', 'Post created successfully!');
    }
}
