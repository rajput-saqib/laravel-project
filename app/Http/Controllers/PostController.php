<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(array('auth'));
    }

    public function index()
    {
        $posts = Post::paginate(10); //simplePaginate
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'Field required (:attribute)',
            'unique' => 'Already exist (:attribute)',
        ];

        $rule = [
            'title' => 'required|max:255|min:5|unique:posts',
            'body' => 'required'
        ];

        $request->validate($rule, $messages);

        if($request->hasFile('thumbnail') && $request->thumbnail->isValid()) {

            $extension = $request->file('thumbnail')->clientExtension();
            $fileName = time().'.'.$extension;
            $request->thumbnail->move(public_path('images'), $fileName);

        } else {
            $fileName = 'no-image.jpg';
        }

        $create = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'thumbnail' => $fileName
        ]);

//        $create = Post::create($request->all());

        if($create) {
            session()->flash('flash_msg', 'create successfully.');
            return redirect('posts/create')->with('message', 'Post added successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = Post::findOrFail($request->id);

        $post->title = $request->title;
        $post->body = $request->body;

        $updated = $post->save();

        if($updated) {
            return redirect('posts')->with('message', 'Post updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $deleted = $post->delete();

        if($deleted) {
            return redirect('posts')->with('message', 'Post deleted.');
        }
    }
}
