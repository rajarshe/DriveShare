<!-- resources/views/cars/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Car Rentals</h1>
    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Add New Car</a>
    
    <div class="row">
        @foreach($cars as $car)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/'.$car->image) }}" class="card-img-top" alt="{{ $car->model }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->model }}</h5>
                        <p class="card-text">Year: {{ $car->year }}</p>
                        <p class="card-text">Price: ${{ $car->rental_pricing }} per day</p>
                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
