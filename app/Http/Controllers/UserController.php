<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Show a list of users
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        // Show the details of a specific user
        return view('users.show', compact('user'));
    }
}
