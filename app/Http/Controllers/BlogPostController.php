<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        //
        return BlogPost::with('user:id,name')->latest()->get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:3'
        ]);
        $blogPost = BlogPost::create(
            [
                'user_id' => auth()->id(),
                'title' => $request->title,
                'body' => $request->body
            ]
        );
        return response()->json([$blogPost]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id): \Illuminate\Http\JsonResponse
    {
        //
        $blogPost = BlogPost::with('user:id,name')->findOrFail($id);
        return response()->json($blogPost);
    }


    public function edit($id): \Illuminate\Http\JsonResponse
    {
        $this->authorize('update', BlogPost::findOrFail($id));
        $blogPost = BlogPost::with('user:id,name')->findOrFail($id);
        return response()->json($blogPost);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $post): \Illuminate\Http\JsonResponse
    {
        $this->authorize('update', $post);
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:3'
        ]);
        $post->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return response()-> json(['data'=>$post]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $this->authorize('delete', BlogPost::findOrFail($id) );
        $blogPost = BlogPost::findOrFail($id)->delete();
        return response()->json(['message' => 'Blog post deleted successfully'], 200);
    }
}
