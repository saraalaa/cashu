<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('customer_id', auth()->id())->latest()->paginate();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::get(['id', 'name']);
        return view('user.create', compact('roles'));
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $user = User::create($validated);
        $user->roles()->attach($validated['roles']);

        return redirect()->route('users.index')->with('success', 'User Created Successfully');
    }
}
