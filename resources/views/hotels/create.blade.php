@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a New Hotel</h1>

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form to create a new hotel -->
        <form action="{{ route('hotels.store') }}" method="POST">
            @csrf  <!-- This is important for protecting against CSRF attacks -->

            <div class="form-group">
                <label for="name">Hotel Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="localisation">Localisation</label>
                <input type="text" name="localisation" id="localisation" class="form-control" value="{{ old('localisation') }}" required>
            </div>

            <div class="form-group">
                <label for="certification">Certification</label>
                <input type="text" name="certification" id="certification" class="form-control" value="{{ old('certification') }}">
            </div>

            <button type="submit" class="btn btn-primary">Create Hotel</button>
        </form>
    </div>
@endsection
