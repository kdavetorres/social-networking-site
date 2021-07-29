<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index($userid)
    {
        $userprofile = User::findOrFail($userid);
        return view('home', ['userprofile' => $userprofile]);
    }
}
