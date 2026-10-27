@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Payment Methods</h2>

        <a href="{{ route('payment-methods.create') }}"
           class="btn btn-primary">
            Add Payment Method
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th width="160">Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($paymentMethods as $paymentMethod)

                    <tr>
                        <td>{{ $paymentMethod->id }}</td>

                        <td>
                            {{ $paymentMethod->name }}
                        </td>

                        <td>
                            <span class="badge bg-secondary">
                                {{ $paymentMethod->code }}
                            </span>
                        </td>

                        <td>
                            {{ $paymentMethod->description ?: '-' }}
                        </td>

                        <td>
                            @if($paymentMethod->is_active)
                                <span class="badge bg-success">
                                    Active
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <td>

                            <a href="{{ route('payment-methods.edit', $paymentMethod) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('payment-methods.destroy', $paymentMethod) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this payment method?')">
                                    Delete
                                </button>

                            </form>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="6"
                            class="text-center text-muted py-4">
                            No payment methods found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $paymentMethods->links() }}
    </div>

</div>
@endsection