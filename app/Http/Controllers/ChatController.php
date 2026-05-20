<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AiAgents\EduHelperAgent;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat_box.chat');
    }

    public function send(Request $request)
    {
        $message = $request->message;

        // conversation history
        $history = session()->get('history', []);

        $history[] = [
            'role' => 'user',
            'content' => $message
        ];

        $agent = new EduHelperAgent();

        $response = $agent->respond($message);

        $history[] = [
            'role' => 'assistant',
            'content' => $response
        ];

        session()->put('history', $history);

        return response()->json([
            'reply' => $response
        ]);
    }
}