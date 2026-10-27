@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit category</h2>
    <div class="card">
        <div class="card-body table-responsive">
            <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>Name</div>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name', $category->name) }}" required>
                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Image</div>
                @if($category->images)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $category->images) }}" alt="{{ $category->name }}" style="width: 120px; height: 120px; object-fit: cover;">
                    </div>
                @endif
                <input type="file" name="images" class="form-control" accept="image/*">
                @error('images')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <button type="button" class="btn btn-default" onclick="history.back()">Back</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
