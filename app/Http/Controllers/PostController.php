<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $user = new User();
        dump($user->posts());
        $post = new Post();
        dd($post->user());
        return view('posts.index');
    }
}
