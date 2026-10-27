<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.contactus');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        // Save message in database
        $contactMessage = ContactMessage::create($validated);

        // Send email
        // Mail::to(config('mail.contact_email'))
        //     ->send(new ContactMessageMail($contactMessage));

        return redirect()
            ->route('contact-us')
            ->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
