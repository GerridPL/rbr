<?php

namespace App\Http\Controllers;

use App\Http\Services\LogService;
use App\Models\Log;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        LogService::logReadPost();
        return view('posts', compact('posts'));
    }
}
