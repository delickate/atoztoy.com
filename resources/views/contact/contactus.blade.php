@extends('layouts.frontend')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Contact us</h2>

        
    </div>

   

    <div class="card">
        <div class="card-body">
           
        

            

            <p class="mb-4">
                Have a question? Send us a message and we'll get back to you.
            </p>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('contact.store') }}"
                method="POST"
            >

                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Name *
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            required
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Email *
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            required
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone') }}"
                        >
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Subject
                        </label>

                        <input
                            type="text"
                            name="subject"
                            class="form-control"
                            value="{{ old('subject') }}"
                        >
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            Message *
                        </label>

                        <textarea
                            name="message"
                            rows="6"
                            class="form-control"
                            required
                        >{{ old('message') }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            Send Message
                        </button>
                    </div>

                </div>

            </form>




        </div>
    </div>   
</div>    
<br /><br />
@endsection
