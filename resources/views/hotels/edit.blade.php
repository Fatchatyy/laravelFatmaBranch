@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Hotel</h1>

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

        <!-- Form to edit a hotel -->
        <form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- This is important to indicate the form method for updating -->

            <div class="form-group">
                <label for="name">Hotel Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $hotel->name) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $hotel->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="localisation">Localisation</label>
                <input type="text" name="localisation" id="localisation" class="form-control" value="{{ old('localisation', $hotel->localisation) }}" required>
            </div>

            <div class="form-group">
                <label for="certification">Certification</label>
                <input type="text" name="certification" id="certification" class="form-control" value="{{ old('certification', $hotel->certification) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Hotel</button>
        </form>
    </div>
@endsection
