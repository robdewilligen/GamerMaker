<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
//    public function index(User $user)
//    {
//        return view('users.profile.edit', [
//            'user' => $user,
//        ]);
//    }

    public function show($id)
    {
        return view('user.profile', [
           'user' => User::findOrFail($id)
        ]);
    }

    public function edit(User $user)
    {
        return view('profile.edit');
    }
}
