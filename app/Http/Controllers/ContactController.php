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


        // Validate form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:100',
            'service' => 'required|string',
            'message' => 'nullable|string',
        ]);

        // Store in database
        $contact = ContactInfor::create($validated);

        // Send email to customer
        Mail::to($validated['email'])->send(new ContactConfirmation($contact));

        return back()->with('success', 'Thank you! Your message has been sent.');
    }
}
