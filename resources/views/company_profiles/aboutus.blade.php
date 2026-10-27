@extends('layouts.frontend')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Company Profiles</h2>

        
    </div>

   

    <div class="card">
        <div class="card-body">
            {{ $companyProfile?->detail_description }}

        </div>
    </div>   
</div>    
<br /><br />
@endsection
