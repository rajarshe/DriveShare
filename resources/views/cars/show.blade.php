<!-- resources/views/cars/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $car->model }} ({{ $car->year }})</h1>
    <img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->model }}" class="img-fluid">
    <p><strong>Mileage:</strong> {{ $car->mileage }} miles</p>
    <p><strong>Pick-up Location:</strong> {{ $car->pick_up_location }}</p>
    <p><strong>Pricing:</strong> ${{ $car->rental_pricing }} per day</p>
    <p><strong>Availability:</strong> {{ implode(', ', json_decode($car->availability_calendar)) }}</p>

    <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back to Cars</a>
    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
