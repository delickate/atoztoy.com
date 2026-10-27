<h2>New Contact Us Message</h2>

<p>
    You have received a new message from your website.
</p>

<hr>

<p>
    <strong>Name:</strong>
    {{ $contactMessage->name }}
</p>

<p>
    <strong>Email:</strong>
    {{ $contactMessage->email }}
</p>

@if($contactMessage->phone)
    <p>
        <strong>Phone:</strong>
        {{ $contactMessage->phone }}
    </p>
@endif

@if($contactMessage->subject)
    <p>
        <strong>Subject:</strong>
        {{ $contactMessage->subject }}
    </p>
@endif

<p>
    <strong>Message:</strong>
</p>

<p>
    {!! nl2br(e($contactMessage->message)) !!}
</p>

<hr>

<p>
    Received:
    {{ $contactMessage->created_at->format('d M Y, h:i A') }}
</p>
