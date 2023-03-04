<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(PostFormRequest $request)
    {
        $validated = $request->validated();

        $post = Post::create($validated);

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

    public function update(PostFormRequest $request, Post $post)
    {
        $validated = $request->validated();

        $post->update($validated);

        return redirect()->route('posts.show', [$post])->with('success', 'Post is updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('home')->with('success', 'Post has be deleted !!!');
    }
}
