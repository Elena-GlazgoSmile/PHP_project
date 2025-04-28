<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User_MB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User_MB::all();
        $sender=Message::all();
        $currUser=Auth::user();
        return view('users.index', compact('users', 'currUser'));
    }
}
