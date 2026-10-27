@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Users</h2>
    <div class="card">
        <div class="card-body table-responsive">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Add user</a>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped mt-3">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Actions</th>
                </tr>

                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span class="badge bg-secondary">{{ $role->label ?: $role->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('users.edit',$user) }}">Edit</a>

                        <form action="{{ route('users.destroy',$user) }}"
                              method="POST"
                              style="display:inline">
                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection