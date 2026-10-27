@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create user</h2>
    <div class="card">
        <div class="card-body table-responsive">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div>Name</div>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Email</div>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Password</div>
                <input type="password" name="password" class="form-control" required>
                @error('password')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Roles</div>
                <div class="row">
                    @foreach($roles as $role)
                        <div class="col-md-3">
                            <label>
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ in_array($role->id, old('roles', [])) ? 'checked' : '' }}>
                                {{ $role->label ?: $role->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('roles')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <button type="button" class="btn btn-default" onclick="history.back()">Back</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection