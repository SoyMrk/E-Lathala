<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(User $user)
    {
        return view('users.profile',[
            'user' => $user
        ]);
    }

    public function edit(Request $request, User $user)
    {
      

        $update = DB::table('users')
        ->where('id', $request->user->id)
        ->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email
        ]);

        return redirect()->route('home');
    }
}
