<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatbotLead;

class ChatBotController extends Controller
{
    public function handle(Request $request)
    {
        $userMessage = strtolower($request->input('message'));

        // Basic hardcoded responses (can connect to AI later)
        $reply = match (true) {
            str_contains($userMessage, 'tour') => 'We offer a variety of inbound and outbound tours. What country or city are you interested in?',
            str_contains($userMessage, 'sri lanka') => 'We have amazing Sri Lankan tour packages! Cultural, Adventure, Beach, and more.',
            str_contains($userMessage, 'price') => 'Tour prices vary. Please let us know your destination and number of days.',
            default => 'I\'m here to help with your tour questions! Try asking about Sri Lanka tours or prices.',
        };

        return response()->json(['reply' => $reply]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        ChatbotLead::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'service' => $request->service
        ]);

        return response()->json(['success' => true]);
    }
}
