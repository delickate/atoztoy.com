@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit product</h2>
    <div class="card">
        <div class="card-body table-responsive">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>Category</div>
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Name</div>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Description</div>
                <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                @error('description')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                @if($product->thumb_image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $product->thumb_image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px; object-fit: cover;">
                    </div>
                @endif
                <div>Thumb image</div>
                <input type="file" name="thumb_image" class="form-control" accept="image/*">
                @error('thumb_image')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                @if($product->large_image)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $product->large_image) }}" alt="{{ $product->name }}" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                @endif
                <div>Large image</div>
                <input type="file" name="large_image" class="form-control" accept="image/*">
                @error('large_image')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Price</div>
                <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', $product->price) }}" required>
                @error('price')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Discount Price</div>
                <input type="number" name="discount_price" step="0.01" class="form-control" value="{{ old('discount_price', $product->discount_price) }}">
                @error('discount_price')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Stock</div>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}">
                @error('stock')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div class="form-check">
                    <input type="checkbox" name="featured" value="1" class="form-check-input" {{ old('featured', $product->featured) ? 'checked' : '' }}>
                    <label class="form-check-label">Featured</label>
                </div>

                <div class="form-check">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label">Active</label>
                </div>
                <br>

                <button type="button" class="btn btn-default" onclick="history.back()">Back</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
