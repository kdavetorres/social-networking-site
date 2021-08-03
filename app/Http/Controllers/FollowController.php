<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function store(User $userid)
    {
        return auth()->user()->following()->toggle($userid->profile);
    }
}
