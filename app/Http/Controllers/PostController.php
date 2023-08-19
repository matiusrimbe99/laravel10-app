<?php

namespace App\Http\Controllers;

use App\Mail\BlogPosted;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $posts = Post::active()->get();

        $view_data = [
            'posts' => $posts,
        ];

        return view('posts.index', $view_data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $title = $request->input('title');
        $content = $request->input('content');

        $post = Post::create([
            'title' => $title,
            'content' => $content,
        ]);

        Mail::to(Auth::user()->email)->send(new BlogPosted($post));
        $this->notify_telegram($post);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $post = Post::active()->where('id', $id)->first();

        $comments = $post->comments()->limit(2)->get();

        $total_comments = $post->total_comments();

        $view_data = [
            'post' => $post,
            'comments' => $comments,
            'total_comments' => $total_comments,
        ];

        return view('posts.show', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $selected_post = Post::active()->where('id', $id)->first();

        $view_data = [
            'post' => $selected_post,
        ];
        return view('posts.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $title = $request->input('title');
        $content = $request->input('content');

        Post::active()->where('id', $id)->update([
            'title' => $title,
            'content' => $content,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect("posts/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        Post::active()->where('id', $id)->delete();
        return redirect("posts");
    }

    private function notify_telegram($post)
    {
        $bot_token = "6582231259:AAEfEQQNQi8GCFOtnbrDoZms1KcMpHwpV6g";
        $endpoint = "https://api.telegram.org/bot$bot_token/sendMessage";
        $chat_id = -858082774;
        $content = "Ada postingan baru nih di blog kamu dengan judul: <strong>\"$post->title\"</strong>";

        $data = [
            'chat_id' => $chat_id,
            'text' => $content,
            'parse_mode' => "HTML",
        ];

        Http::post($endpoint, $data);
    }
}
