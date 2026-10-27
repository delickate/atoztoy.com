@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create role</h2>
    <div class="card">
        <div class="card-body table-responsive">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                <div>Name</div>
                <input type="text" name="name" placeholder="Name" class="form-control" value="{{ old('name') }}" required>
                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Label</div>
                <input type="text" name="label" placeholder="Label" class="form-control" value="{{ old('label') }}">
                @error('label')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Permissions</div>
                <div class="row">
                    @foreach($permissions as $permission)
                        <div class="col-md-3">
                            <label>
                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                       {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}>
                                {{ $permission->label ?: $permission->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('permissions')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <button type="button" class="btn btn-default" onclick="history.back()">Back</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
