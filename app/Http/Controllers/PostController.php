<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\CanLoadRelationships;
use App\Traits\FileUploader;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use CanLoadRelationships;
    use FileUploader;
    private array $relations = ['user',];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = $this->loadRelationships(Post::query());
        $posts = PostResource::collection($query->with('user')->latest()->paginate());
        return view('posts.index', ['posts' => $posts]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('posts.create', ['users' => User::all()]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {
        $post = Post::create(
            $request->validated()
        );
        $this->uploadImage($request, $post, "post");
        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $query = $this->loadRelationships($post);
        $post = new PostResource($query);
        // return response()->json(['data' => $posts]);
        return view('posts.show', ['post' => $post]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post, 'users' => User::all()]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $post->update(
            $request->validated()
        );

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        $this->deleteImage($post->image);
        $post->delete();
        return response(status: 204);
    }
}
