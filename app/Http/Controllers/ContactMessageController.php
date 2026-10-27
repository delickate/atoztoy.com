<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = ContactMessage::latest('id')
            ->paginate(15);

        return view('contact_messages.index', compact('messages'));
    }

    public function show(ContactMessage $contactMessage)
    {
        if (!$contactMessage->is_read) {
            $contactMessage->update([
                'is_read' => true,
                'read_at' => now(),
            ]);
        }

        return view(
            'contact_messages.show',
            compact('contactMessage')
        );
    }
}
