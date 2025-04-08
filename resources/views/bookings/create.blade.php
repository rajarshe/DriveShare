<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveShare</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        @include('layouts.nav')
    </div>
    <div class="container mb-5">
        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Car Booking</h2>


        <h5 class="card-title">{{ $car->model }}</h5>
        <p class="card-text">Year: {{ $car->year }}</p>
        <p class="card-text">Mileage: {{ $car->mileage }}</p>
        <p class="card-text">Availability:
            {{ str_replace(['"', '\\'], '', $car->availability_calendar) }}
        </p>
        <p class="card-text">Price: ${{ $car->rental_pricing }} per day</p>
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            {{-- <label>User ID:</label> --}}
            <input type="hidden" name="user_id" required value="{{auth()->user()->id}}"><br>

            {{-- <label>Car ID:</label> --}}
            <input type="hidden" name="car_id" required value="{{$car->id}}"><br>

            <div class="form-group">
                <label for="model">Start Date:</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="model">End Date:</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>

            <button class="btn btn-primary mt-3" type="submit">Book</button>
        </form>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>


    <!-- custome js -->
    <script>

    </script>
</body>

</html>