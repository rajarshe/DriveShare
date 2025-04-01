<!-- resources/views/cars/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Car</h1>
    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="model">Car Model</label>
            <input type="text" name="model" class="form-control" id="model" value="{{ $car->model }}" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" class="form-control" id="year" value="{{ $car->year }}" required>
        </div>
        <div class="form-group">
            <label for="mileage">Mileage</label>
            <input type="number" name="mileage" class="form-control" id="mileage" value="{{ $car->mileage }}" required>
        </div>
        <div class="form-group">
            <label for="availability_calendar">Availability (JSON format)</label>
            <textarea name="availability_calendar" class="form-control" id="availability_calendar" required>{{ implode(', ', json_decode($car->availability_calendar)) }}</textarea>
        </div>
        <div class="form-group">
            <label for="pick_up_location">Pick-up Location</label>
            <input type="text" name="pick_up_location" class="form-control" id="pick_up_location" value="{{ $car->pick_up_location }}" required>
        </div>
        <div class="form-group">
            <label for="rental_pricing">Rental Pricing ($)</label>
            <input type="number" step="0.01" name="rental_pricing" class="form-control" id="rental_pricing" value="{{ $car->rental_pricing }}" required>
        </div>
        <div class="form-group">
            <label for="image">Car Image</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection
