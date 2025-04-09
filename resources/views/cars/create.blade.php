<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveShare</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        @include('layouts.nav')
    </div>
    <div class="container mb-5">
        <h1>Add New Car</h1>
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
                <label for="availability_calendar">Availability</label>
                <textarea name="availability_calendar" class="form-control" id="availability_calendar"
                    required></textarea>
            </div>
            <div class="form-group">
                <label for="pick_up_location">Pick-up Location</label>
                <input type="text" name="pick_up_location" class="form-control" id="pick_up_location" required>
            </div>
            <div class="form-group">
                <label for="rental_pricing">Rental Pricing ($)</label>
                <input type="number" step="0.01" name="rental_pricing" class="form-control" id="rental_pricing"
                    required>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Save Car</button>
            </div>
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