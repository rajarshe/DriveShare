<!-- resources/views/cars/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Car</h1>
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="model">Car Model</label>
            <input type="text" name="model" class="form-control" id="model" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" class="form-control" id="year" required>
        </div>
        <div class="form-group">
            <label for="mileage">Mileage</label>
            <input type="number" name="mileage" class="form-control" id="mileage" required>
        </div>
        <div class="form-group">
            <label for="availability_calendar">Availability (JSON format)</label>
            <textarea name="availability_calendar" class="form-control" id="availability_calendar" required></textarea>
        </div>
        <div class="form-group">
            <label for="pick_up_location">Pick-up Location</label>
            <input type="text" name="pick_up_location" class="form-control" id="pick_up_location" required>
        </div>
        <div class="form-group">
            <label for="rental_pricing">Rental Pricing ($)</label>
            <input type="number" step="0.01" name="rental_pricing" class="form-control" id="rental_pricing" required>
        </div>
        <div class="form-group">
            <label for="image">Car Image</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Save Car</button>
    </form>
</div>
@endsection
