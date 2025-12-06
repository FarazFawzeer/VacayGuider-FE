<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactInfor;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactConfirmation;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:100',
            'service' => 'required|string',
            'message' => 'nullable|string',
        ]);

        // Store in database
        $contact = ContactInfor::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'country' => $validated['country'],
            'service' => $validated['service'],
            'message' => $validated['message'],
            'status' => 'pending',
        ]);

        // If AJAX request, return JSON
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your message has been sent.'
            ]);
        }

        // For normal form submission fallback
        return back()->with('success', 'Thank you! Your message has been sent.');
    }
}
