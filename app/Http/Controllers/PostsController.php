<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $userid = auth()->user()->following()->pluck('profiles.user_id');
        // $posts = Post::whereIn('user_id', $userid)->latest()->get();
        $posts = Post::whereIn('user_id', $userid)->latest()->paginate(3);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $image_path = request('image')->store('uploads', 'public');

        // $image = Image::make(public_path("storage/{$image_path}"))->fit(1200, 1200);
        $image = Image::make(public_path("storage/{$image_path}"))->resize(1200, 1200);

        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $image_path
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
