<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:api', except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::getOrPaginate();

        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug',
            'excerpt' => 'required|string',
            'body' => 'required|string',
            'image' => 'nullable|image',
            'is_published' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = Storage::put('images', $request->file('image'));
        }

        $data['user_id'] = auth('api')->id();

        $post = Post::create($data);

        return PostResource::make($post);
    }

    public function tags(Request $request, Post $post)
    {
        Gate::authorize('author', $post);

        $request->validate([
            'tags' => 'required|array|min:1',
        ]);

        $tags = [];

        foreach ($request->tags as $tag) {
            $tags[] = Tag::firstOrCreate(['name' => $tag])->id;
        }

        $post->load('tags');

        $post->tags()->sync($tags);

        return PostResource::make($post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return PostResource::make($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize('author', $post);

        

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'excerpt' => 'required|string',
            'body' => 'required|string',
            'image' => 'nullable|image',
            'is_published' => 'nullable|boolean',
            'category_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::delete($post->image_path);
            }
            
            $data['image_path'] = Storage::put('images', $request->file('image'));
        }

        $post->update($data);

        return PostResource::make($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('author', $post);

        $post->delete();
        return response()->noContent();
    }
}
