@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Add Shipping Method</h2>

        <a href="{{ route('shipping-methods.index') }}"
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

    <form action="{{ route('shipping-methods.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name') }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>

            <textarea name="description"
                      class="form-control"
                      rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>

            <input type="number"
                   name="price"
                   class="form-control"
                   value="{{ old('price', 0) }}"
                   min="0"
                   step="0.01"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Estimated Days</label>

            <input type="number"
                   name="estimated_days"
                   class="form-control"
                   value="{{ old('estimated_days', 1) }}"
                   min="1"
                   required>
        </div>

        <div class="form-check mb-4">
            <input type="checkbox"
                   name="is_active"
                   value="1"
                   class="form-check-input"
                   id="is_active"
                   {{ old('is_active', true) ? 'checked' : '' }}>

            <label class="form-check-label" for="is_active">
                Active
            </label>
        </div>

        <button type="submit" class="btn btn-primary">
            Save Shipping Method
        </button>

    </form>

</div>
@endsection