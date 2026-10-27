@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Payment Method</h2>

        <a href="{{ route('payment-methods.index') }}"
           class="btn btn-secondary">
            Back
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('payment-methods.update', $paymentMethod) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name', $paymentMethod->name) }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Code</label>

            <input type="text"
                   name="code"
                   class="form-control"
                   value="{{ old('code', $paymentMethod->code) }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>

            <textarea name="description"
                      class="form-control"
                      rows="4">{{ old('description', $paymentMethod->description) }}</textarea>
        </div>

        <div class="form-check mb-4">
            <input type="checkbox"
                   name="is_active"
                   value="1"
                   class="form-check-input"
                   id="is_active"
                   {{ old('is_active', $paymentMethod->is_active) ? 'checked' : '' }}>

            <label class="form-check-label" for="is_active">
                Active
            </label>
        </div>

        <button type="submit" class="btn btn-primary">
            Update Payment Method
        </button>

    </form>

</div>
@endsection