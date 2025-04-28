<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index() {
        $chats = Chat::with('users')->get();
        return view('chats', compact('chats'));
    }

    public function show($chatId)
    {
        $user=Auth::user();
        $messages = \App\Models\Message::where('chat_id', $chatId)
            ->with('sender')
            ->orderBy('created_at')
            ->get();

        return view('chat.show', compact('messages', 'chatId', 'user'));
    }

    public function getOrCreateChat($userId1, $userId2)
    {
        $chat = Chat::whereHas('users', function ($query) use ($userId1) {
        $query->where('user_id', $userId1);
        })->whereHas('users', function ($query) use ($userId2) {
        $query->where('user_id', $userId2);
        })->first();

        if ($chat) {
            return $chat;
        }
        $chat = Chat::create();

        $chat->users()->attach([$userId1, $userId2]);

        return $chat;
    }

    public function getChatBetweenUsers($userId1, $userId2)
    {
        $chat = Chat::whereHas('users', function ($query) use ($userId1) {
        $query->where('user_id', $userId1);
            })->whereHas('users', function ($query) use ($userId2) {
        $query->where('user_id', $userId2);
        })->first();

        if ($chat) {
            return $chat;
        }


        $chat = Chat::create();


        $chat->users()->attach([$userId1, $userId2]);

        return $chat;
    }

    public function startChat($userId, $currentUserId)
    {
        $chat = Chat::whereHas('users', function ($query) use ($currentUserId) {
            $query->where('user_id', $currentUserId);
        })->whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->first();


        if (!$chat) {
            $chat = Chat::create();
            $chat->users()->syncWithoutDetaching([$currentUserId, $userId]);
        }


        return redirect()->route('chat.show', ['chat' => $chat->id]);
    }

    public function send(Request $request, $chat)
    {
        $request->validate([
            'content' => 'required|string',
            'sender_id' => 'required|integer',
        ]);

        \App\Models\Message::create([
            'chat_id' => $chat,
            'sender_id' => $request->input('sender_id'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('chat.show', ['chat' => $chat]);
    }
}
