{{-- {{ dd($bookings->toArray()) }} --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveShare - Bookings</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        @include('layouts.nav')
    </div>

    <div class="container my-5">
        <h2 class="mb-4">User Review</h2>
        @if ($reviews)
            @foreach ($reviews as $review)
                <div class="alert alert-info">
                    <h5>You've already submitted a review for this booking:</h5>
                    <p><strong>Rating:</strong> {{ $review->rating }} / 5</p>
                    <p><strong>Comment:</strong> {{ $review->comment ?? 'No comment provided.' }}</p>
                    <p class="text-muted"><small>Submitted on {{ $review->created_at->format('M d, Y') }}</small></p>
                </div>
            @endforeach
        @else
            <p>This user has no reviews.</p>

        @endif
    </div>

    <div class="container mt-5">
        <h2>Leave a Review</h2>

        <form method="POST" action="{{ route('reviews.store', $booking->id) }}">
            @csrf
            <input type="hidden" value="{{$booking->id}}">
            <div class="mb-3">
                <label for="rating" class="form-label">Rating (1 to 5)</label>
                <select name="rating" class="form-select" required>
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                    @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="comment" class="form-label">Comment (optional)</label>
                <textarea name="comment" class="form-control" rows="4"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Review</button>
        </form>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

</body>

</html>