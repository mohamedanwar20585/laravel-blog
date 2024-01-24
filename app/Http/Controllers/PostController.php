<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postsFromDB = Post::all();
        return view('posts.index', ['posts' => $postsFromDB]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('posts.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            'postcreate' => ['required', 'exists:users,id']
        ]);
        $title = request()->title;
        $description = request()->description;
        $postcreate = request()->postcreate;

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $postcreate,
        ]);
        // dd($title);
        return to_route('posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)

    {
        $users = User::all();
        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $post)
    {
        $title = request()->title;
        $description = request()->description;
        $postcreate = request()->postcreate;
        $singlPostDB = Post::findOrFail($post);
        $singlPostDB->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $postcreate,

        ]);
        // dd($singlPostDB);

        return to_route('posts.show',   $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($post)
    {
        $post = Post::find($post);
        $post->delete();
        return to_route('posts');
    }
}
