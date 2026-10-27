@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Roles</h2>
    <div class="card">
        <div class="card-body table-responsive">
            <a href="{{ route('roles.create') }}" class="btn btn-primary">Add role</a>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped mt-3">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Label</th>
                    <th>Permissions</th>
                    <th>Actions</th>
                </tr>

                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->label }}</td>
                    <td>{{ $role->permissions_count }}</td>
                    <td>
                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('roles.destroy', $role) }}"
                              method="POST"
                              style="display:inline">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this role?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {{ $roles->links() }}
        </div>
    </div>
</div>
@endsection
