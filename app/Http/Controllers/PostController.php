<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        // $user = new User();
        // dump($user->posts());
        // $post = new Post();
        // dd($post->user());
        return view('posts.index');
    }

    public function store(PostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $request->user()->posts()->create($validated);

        return redirect(route('posts.index'));
    }
}
