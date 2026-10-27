@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Company Profiles</h2>

        <!-- <a href="{{ route('company-profiles.create') }}"
           class="btn btn-primary">
            Add Company Profile
        </a> -->
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Company Name</th>
                            <th>Owner</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($companyProfiles as $profile)

                            <tr>
                                <td>{{ $profile->id }}</td>

                                <td>
                                    @if($profile->logo_image)
                                        <img
                                            src="{{ asset('storage/' . $profile->logo_image) }}"
                                            width="60"
                                            height="60"
                                            style="object-fit: cover;"
                                            alt="{{ $profile->company_name }}"
                                        >
                                    @else
                                        <span class="text-muted">
                                            No Logo
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $profile->company_name }}
                                </td>

                                <td>
                                    {{ $profile->owner_name ?? '-' }}
                                </td>

                                <td>
                                    {{ $profile->phone_no ?? '-' }}
                                </td>

                                <td>
                                    {{ $profile->email_address ?? '-' }}
                                </td>

                                <td>
                                    {{ $profile->address ?? '-' }}
                                </td>

                                <td>
                                    <a href="{{ route('company-profiles.edit', $profile->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="text-center">
                                    No company profiles found.
                                </td>
                            </tr>

                        @endforelse
                    </tbody>

                </table>
            </div>

            {{ $companyProfiles->links() }}

        </div>
    </div>

</div>

@endsection
