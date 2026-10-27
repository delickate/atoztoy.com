@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Contact Messages</h2>
            <p class="text-muted mb-0">
                Messages received from website visitors.
            </p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead>
                        <tr>
                            <th width="60">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th width="100">Status</th>
                            <th width="80">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($messages as $message)

                            <tr>

                                <td>
                                    {{ $message->id }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $message->name }}
                                    </strong>
                                </td>

                                <td>
                                    <a href="mailto:{{ $message->email }}">
                                        {{ $message->email }}
                                    </a>
                                </td>

                                <td>
                                    {{ $message->phone ?? '-' }}
                                </td>

                                <td>
                                    {{ $message->subject ?? '-' }}
                                </td>

                                <td>
                                    {{ \Illuminate\Support\Str::limit($message->message, 80) }}
                                </td>

                                <td>
                                    {{ $message->created_at->format('d M Y') }}

                                    <br>

                                    <small class="text-muted">
                                        {{ $message->created_at->format('h:i A') }}
                                    </small>
                                </td>

                                <td>

                                    @if($message->is_read)

                                        <span class="badge bg-success">
                                            Read
                                        </span>

                                    @else

                                        <span class="badge bg-warning text-dark">
                                            Unread
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a
                                        href="{{ route('admin.contact-messages.show', $message->id) }}"
                                        class="btn btn-sm btn-primary"
                                    >
                                        View
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="9" class="text-center py-4">
                                    No contact messages found.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            {{-- Pagination --}}

            <div class="d-flex justify-content-between align-items-center mt-3">

                <div class="text-muted">
                    Showing
                    {{ $messages->firstItem() ?? 0 }}
                    to
                    {{ $messages->lastItem() ?? 0 }}
                    of
                    {{ $messages->total() }}
                    messages
                </div>

                <div>
                    {{ $messages->links() }}
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
