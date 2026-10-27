@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Shipping Methods</h2>

        <a href="{{ route('shipping-methods.create') }}"
           class="btn btn-primary">
            Add Shipping Method
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
                    <th>Description</th>
                    <th>Price</th>
                    <th>Estimated Days</th>
                    <th>Status</th>
                    <th width="160">Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($shippingMethods as $shippingMethod)

                    <tr>
                        <td>{{ $shippingMethod->id }}</td>

                        <td>
                            {{ $shippingMethod->name }}
                        </td>

                        <td>
                            {{ $shippingMethod->description ?: '-' }}
                        </td>

                        <td>
                            {{ number_format($shippingMethod->price, 2) }}
                        </td>

                        <td>
                            {{ $shippingMethod->estimated_days }}
                            {{ $shippingMethod->estimated_days == 1 ? 'day' : 'days' }}
                        </td>

                        <td>
                            @if($shippingMethod->is_active)
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

                            <a href="{{ route('shipping-methods.edit', $shippingMethod) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('shipping-methods.destroy', $shippingMethod) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this shipping method?')">
                                    Delete
                                </button>

                            </form>

                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="7"
                            class="text-center text-muted py-4">
                            No shipping methods found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $shippingMethods->links() }}
    </div>

</div>
@endsection
