@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Contact Message</h2>

        <a
            href="{{ route('admin.contact-messages.index') }}"
            class="btn btn-secondary"
        >
            Back
        </a>

    </div>

    <div class="card">

        <div class="card-body">

            <div class="row mb-3">

                <div class="col-md-6">
                    <strong>Name:</strong>
                    <br>
                    {{ $contactMessage->name }}
                </div>

                <div class="col-md-6">
                    <strong>Email:</strong>
                    <br>

                    <a href="mailto:{{ $contactMessage->email }}">
                        {{ $contactMessage->email }}
                    </a>
                </div>

            </div>

            <div class="row mb-3">

                <div class="col-md-6">
                    <strong>Phone:</strong>
                    <br>
                    {{ $contactMessage->phone ?? '-' }}
                </div>

                <div class="col-md-6">
                    <strong>Subject:</strong>
                    <br>
                    {{ $contactMessage->subject ?? '-' }}
                </div>

            </div>

            <hr>

            <div class="mb-3">

                <strong>Message:</strong>

                <div class="border rounded p-3 mt-2 bg-light">
                    {!! nl2br(e($contactMessage->message)) !!}
                </div>

            </div>

            <hr>

            <div class="text-muted">

                Received:
                {{ $contactMessage->created_at->format('d M Y, h:i A') }}

            </div>

        </div>

    </div>

</div>

@endsection
