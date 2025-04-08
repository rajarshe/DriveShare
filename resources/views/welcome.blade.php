<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveShare</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        @include('layouts.nav')
    </div>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <h1 class="text-center mb-4">Welcome to DriveShare</h1>
        <!-- <p class="text-center mb-5">A secure password management system designed to keep your sensitive information safe.</p> -->
        
        <div class="d-flex gap-3">
            <!-- <a href="{{route('user.login')}}" class="btn btn-primary btn-lg">Login</a>
            <a href="{{route('user.register')}}" class="btn btn-outline-primary btn-lg">Register</a> -->
        </div>

        <div class="row">
            <div class="row">
                @foreach($cars as $car)
                    <div class="col-md-4 mt-2">
                        <div class="card">
                            <!-- Uncomment if image display is needed -->
                            <!-- <img src="{{ asset('storage/'.$car->image) }}" class="card-img-top" alt="{{ $car->model }}"> -->
                            <div class="card-body">
                                <h5 class="card-text">{{ $car->model }}</h5>
                                <p class="card-text">Year: {{ $car->year }}</p>
                                <p class="card-text">Mileage: {{ $car->mileage }}</p>
                                <p class="card-text">Availability:
                                    {{ str_replace(['"', '\\'], '', $car->availability_calendar) }}
                                </p>
                                <p class="card-text">Price: ${{ $car->rental_pricing }} per day</p>

                                <!-- <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info">View Details</a> -->
                                <a href="{{ route('booking.index', $car->id) }}" class="btn btn-warning">Booking</a>

                                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


    <!-- custome js -->
    <script>
        
    </script>
</body>
</html>