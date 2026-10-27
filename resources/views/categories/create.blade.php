@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create category</h2>
    <div class="card">
        <div class="card-body table-responsive">
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div>Name</div>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required>
                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Image</div>
                <input type="file" name="images" class="form-control" accept="image/*">
                @error('images')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <button type="button" class="btn btn-default" onclick="history.back()">Back</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
