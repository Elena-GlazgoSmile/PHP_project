<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Chat extends Model
{
    protected $fillable = [];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function users()
    {
        return $this->belongsToMany(User_MB::class, 'chat_user', 'chat_id', 'user_id');
    }

    public function show($chatId)
{
    $chat = Chat::with('messages.sender')->findOrFail($chatId);
    return view('chat', compact('chat'));
}

    public function sendMessage(Request $request, $chatId)
    {
        $request->validate([
            'content' => 'required',
            'sender_id' => 'required|exists:user__m_b_s,id',
        ]);

        Message::create([
            'chat_id' => $chatId,
            'sender_id' => $request->input('sender_id'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('chat.show', ['chat' => $chatId]);
    }
}
