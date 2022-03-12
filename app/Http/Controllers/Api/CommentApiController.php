<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Comment[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request -> validate([
            'post_id'=>'required|integer',
            'content'=>'required|string',
            'author'=>'required|integer'
        ]);

        $comment = new Comment();
        $comment->post_id = $request['post_id'];
        $comment->content = $request['content'];
        $comment->author = $request['author'];
        $comment->save();

        return response()->json(["message" => "Success"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  Comment $comment
     * @return Comment
     */
    public function show(Comment $comment)
    {
        return $comment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id): \Illuminate\Http\JsonResponse
    {
        $request -> validate([
            'post_id'=>'required|integer',
            'content'=>'required|string',
            'author'=>'required|integer'
        ]);
        $comment = Comment::findOrFail($id);
        $comment->post_id = $request['post_id'];
        $comment->content = $request['content'];
        $comment->author = $request['author'];
        $comment->update();

        return response()->json(["message" => "Success"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $post = Comment::findOrFail($id);
        $post->delete();

        return response()->json(["message" => "Success"], 200);
    }
}
