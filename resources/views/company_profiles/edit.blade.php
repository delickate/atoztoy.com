@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Company Profile</h2>

        <a href="{{ route('company-profiles.index') }}"
           class="btn btn-secondary">
            Back
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            <form
                action="{{ route('company-profiles.update', $companyProfile->id) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                @include('company_profiles._form')

                <button type="submit" class="btn btn-primary">
                    Update Company Profile
                </button>

            </form>

        </div>
    </div>

</div>

@endsection
