@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create product</h2>
    <div class="card">
        <div class="card-body table-responsive">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div>Category</div>
                <select name="category_id" class="form-control" required>
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Name</div>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Description</div>
                <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Thumb image</div>
                <input type="file" name="thumb_image" class="form-control" accept="image/*">
                @error('thumb_image')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Large image</div>
                <input type="file" name="large_image" class="form-control" accept="image/*">
                @error('large_image')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Price</div>
                <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', 0) }}" required>
                @error('price')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Discount Price</div>
                <input type="number" name="discount_price" step="0.01" class="form-control" value="{{ old('discount_price') }}">
                @error('discount_price')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Stock</div>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', 0) }}">
                @error('stock')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div class="form-check">
                    <input type="checkbox" name="featured" value="1" class="form-check-input" {{ old('featured') ? 'checked' : '' }}>
                    <label class="form-check-label">Featured</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label class="form-check-label">Active</label>
                </div>
                <br>

                <button type="button" class="btn btn-default" onclick="history.back()">Back</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
