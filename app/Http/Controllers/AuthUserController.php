<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{

    public function getLogin()
    {
        return view('user.login');
    }

    public function login(UserLoginRequest $request)
    {
        if (Auth::guard('customer_users')->attempt($request->validated()))
        {
            return redirect(route('user.home'));
        }
        return redirect(route('user.login'));
    }

    public function home()
    {
        return view('home');
    }
}
