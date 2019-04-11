<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $id = auth()->id();

        $user = User::where('id', $id)->first();

        return view('user.index', compact('user'));
    }
}
