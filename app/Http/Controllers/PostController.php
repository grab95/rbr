<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    // URL to external API
    private $postApiUrl = 'https://jsonplaceholder.typicode.com/posts';

    public function index()
    {
        $posts = Post::all();

        return view('posts.index', [
            'posts' => $posts,
        ]);

    }

    /**
     * Decides whether to update or add
     */
    public function addOrUpdate()
    {
        $apiPosts = Http::get($this->postApiUrl)->json();
        foreach ($apiPosts as $apiPost) {
            $post = Post::find($apiPost['id']);
            $post ? $post->update($apiPost) : $this->addPost($apiPost);
        }

    }

    /**
     * Saves a new post
     */
    public function addPost($apiPost)
    {
        $post = new Post($apiPost);
        $post->save();
    }

    /**
     * Shows the post details page
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);

    }
}
