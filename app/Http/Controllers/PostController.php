<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Http\Controllers\Controller;
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
        $posts = PostResource::collection($query->latest()->paginate());
        return response()->json(['data' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = Post::create(
            $request->all()
        );

        $this->uploadImage($request, $post, "post");
        $query = $this->loadRelationships($post);
        $posts = new PostResource($query);
        return response()->json(['data' => $posts]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $query = $this->loadRelationships($post);
        $posts = new PostResource($query);
        return response()->json(['data' => $posts]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update(
            $request->all()
        );
        $query = $this->loadRelationships($post);
        $post = new PostResource($query);
        return response()->json(['data' => $post]);
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
