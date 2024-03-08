<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function show(int $id)
    {
        // $user = User::where('id', $id)->first();
        $user = User::find($id);

        if (!$user = User::find($id))
            return redirect()->route('users.show');

        
        return view('users.show', compact('user'));
    }
    
}
