<?php

namespace App\Http\Controllers\Dashboard\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::paginate(30);
        $agent = $users->where('role', 'agent');
        return view('dashboard.users.index', [
            'users' => $users,
            'agent' => $agent,
        ]);
    }
}
