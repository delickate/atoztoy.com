@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Categories</h2>
    <div class="card">
        <div class="card-body table-responsive">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Add category</a>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped mt-3">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Created By</th>
                    <th>Updated By</th>
                    <th>Actions</th>
                </tr>

                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if($category->images)
                            <img src="{{ asset('storage/' . $category->images) }}" alt="{{ $category->name }}" style="width: 60px; height: 60px; object-fit: cover;">
                        @else
                            <span class="text-muted">No image</span>
                        @endif
                    </td>
                    <td>{{ $category->createdBy?->name ?? '-' }}</td>
                    <td>{{ $category->updatedBy?->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
