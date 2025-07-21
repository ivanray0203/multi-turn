<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class MultiTurnChatController extends Controller
{
    public function index(Request $request)
    {
      $message = [
            (object)[
                'role' => 'system',
                'content' => 'You are a helpful assistant.'
            ]
        ];

        return Inertia::render('Dashboard', [
            'message' => $message,
        ]);
    }

   public function chat(Request $request)
  {
    $message = $request->validate([
        'messages' => 'required|array'
    ]);

    $response = Http::withOptions(['verify' => false])
        ->withToken(config('openai.api_key'))
        ->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o',
            'temperature' => 0.7,
            'messages' => $message['messages'],
        ]);

    $data = $response->json()['choices'][0]['message'];

    $message['messages'][] = [
        'role' => $data['role'],
        'content' => $data['content'],
    ];

    return Inertia::render('Dashboard', [
        'message' => $message['messages'],
    ]);
}
}
