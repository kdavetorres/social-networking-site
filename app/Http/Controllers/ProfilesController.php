<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $userid)
    {
        // $userprofile = User::findOrFail($userid);
        // return view('home', ['userprofile' => $userprofile]);
        $follows = (auth()->user()) ? auth()->user()->following->contains($userid->id) : false;
        return view('profiles.index', compact('userid', 'follows'));
    }

    public function edit(User $userid)
    {
        $this->authorize('update', $userid->profile); /* it will look for ProfilelPolicy.php update function */
        return view('profiles.edit', compact('userid'));
    }

    public function update(User $userid)
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image'
        ]);

        if (request('image')) {
            $image_path = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$image_path}"))->resize(1000, 1000);
            $image_array = ['image' => $image_path];
            $image->save();
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $image_array ?? []
        ));


        return redirect("/profile/{$userid->id}");
    }
}
