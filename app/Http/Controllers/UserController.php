<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password,
        ]);

        return response()->json($user, 201);
    }

    public function assignTask(Request $request, User $user)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
        ]);

        $user->tasks()->attach($request->task_id);
        return response()->json(null, 204);
    }
}
