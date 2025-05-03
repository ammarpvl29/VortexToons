<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function handleChatMessage(Request $request)
    {
        // Validate the request
        $request->validate([
            'message' => 'required|string|max:1024'
        ]);

        // Forward the message to the Flask API
        $flaskApiUrl = 'http://127.0.0.1:5000/chat'; // Flask API endpoint
        $response = Http::post($flaskApiUrl, [
            'prompt' => $request->input('message'),
        ]);

        // Return the API response to the frontend
        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Failed to fetch response from chatbot'], 500);
        }
    }
}