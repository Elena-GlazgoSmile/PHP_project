<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Friend;
use Illuminate\Support\Facades\Auth;
use App\Models\User_MB;

class FriendsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $friends = User_MB::whereIn('id', function($query) use ($user) {
            $query->select('friend_id')
                ->from('friends')
                ->where('user_id', $user->id);
        })->get();

        return view('friends.index', compact('friends'));
    }

    public function add(Request $request)
    {
        $friendId = $request->input('friend_id');
        $user = Auth::user();

        Friend::firstOrCreate([
            'user_id' => $user->id,
            'friend_id' => $friendId,
        ]);

    return redirect()->back();
    }
    public function list()
    {
        $user = Auth::user();

        $users = User_MB::where('id', '!=', $user->id)->get();

        $friendIds = Friend::where('user_id', $user->id)->pluck('friend_id')->toArray();

        return view('friends.list', compact('users', 'friendIds'));
    }

    public function remove($friendId)
    {
        $user = Auth::user();
        Friend::where('user_id', $user->id)
            ->where('friend_id', $friendId)
            ->delete();
        return redirect()->back();
    }
}
