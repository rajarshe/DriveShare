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
                <input type="number" name="mileage" class="form-control" id="mileage" value="{{ $car->mileage }}"
                    required>
            </div>
            <div class="form-group">
                <label for="availability_calendar">Availability</label>
                <textarea name="availability_calendar" class="form-control" id="availability_calendar"
                    required>{{ str_replace(['"', '\\'], '', $car->availability_calendar) }}</textarea>
            </div>
            <div class="form-group">
                <label for="pick_up_location">Pick-up Location</label>
                <input type="text" name="pick_up_location" class="form-control" id="pick_up_location"
                    value="{{ $car->pick_up_location }}" required>
            </div>
            <div class="form-group">
                <label for="rental_pricing">Rental Pricing ($)</label>
                <input type="number" step="0.01" name="rental_pricing" class="form-control" id="rental_pricing"
                    value="{{ $car->rental_pricing }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Save Changes</button>
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