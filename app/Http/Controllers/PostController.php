<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => ['required', 'min:10']
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();

        return redirect()
            ->route('posts.show', [$post])
            ->with('success', 'Post is submitted! Title: ' .$post->title . ' Description: ' . $post->description);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => ['required', 'min:10']
        ]);

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();

        return redirect()
            ->route('posts.show', [$post])
            ->with('success', 'Post is updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
            ->route('home')
            ->with('success', 'Post has be deleted !!!');
    }
}
