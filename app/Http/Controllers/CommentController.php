<?php

namespace App\Http\Controllers;

use App\Http\Services\LogService;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::get();
        LogService::logReadComment();
        return view('comments', compact('comments'));
    }
}
