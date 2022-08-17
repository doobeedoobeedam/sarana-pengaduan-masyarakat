<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return view('users/index', [
            'users' => User::all()
        ]);
    }

    public function create() {
        return view('users/create');
    }
}
