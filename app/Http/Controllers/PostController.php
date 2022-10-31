<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::all();
        return view('post.index', compact('post'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
        ]);
        Post::create($input);
        return redirect()->route('post.index')->with('status', 'Upload post success');
    }
}