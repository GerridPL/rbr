<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Post[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request -> validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'author'=>'required|integer'
        ]);
        $post = new Post();
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->author = $request['author'];
        $post->save();

        return response()->json(["message" => "Success"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return Post
     */
    public function show(Post $post): Post
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $request -> validate([
            'title'=>'required|string',
            'content'=>'required|string',
            'author'=>'required|integer'
        ]);
        $post = Post::findOrFail($id);
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->author = $request['author'];
        $post->update();

        return response()->json(["message" => "Success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(["message" => "Success"], 200);
    }
}
