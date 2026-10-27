@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit user</h2>
    <div class="card">
        <div class="card-body table-responsive">
            <form action="{{ route('users.update',$user) }}" method="POST">
                @csrf
                @method('PUT')

                <div>Name</div>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Email</div>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                @error('email')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Password</div>
                <input type="password" name="password" class="form-control" placeholder="Leave empty to keep current password">
                @error('password')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <div>Roles</div>
                <div class="row">
                    @foreach($roles as $role)
                        <div class="col-md-3">
                            <label>
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ in_array($role->id, old('roles', $user->roles->pluck('id')->toArray())) ? 'checked' : '' }}>
                                {{ $role->label ?: $role->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('roles')<div class="text-danger">{{ $message }}</div>@enderror
                <br>

                <button type="button" class="btn btn-default" onclick="history.back()">Back</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection