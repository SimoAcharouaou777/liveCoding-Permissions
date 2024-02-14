<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->get();
        return view('client.posts' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.creatPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new Post instance
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        auth()->user()->posts()->save($post);


        return redirect()->route('posts.index');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

    
    // if (auth()->user()->id != $post->user_id) {
    //     abort(403, 'Unauthorized action.');
    // }

    return view('client.edite', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        $post = Post::findOrFail($id);
    

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
    

        return redirect()->route('posts.index', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);


    // if (auth()->user()->id != $post->user_id) {
    //     abort(403, 'Unauthorized action.');
    // }

    $post->delete();

    return redirect()->route('posts.index');
    }
}
