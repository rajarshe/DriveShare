{{-- {{dd($car->toArray())}} --}}


<h2>All Bookings</h2>
<ul>
    @foreach ($bookings as $booking)
        <li>
            Booking #{{ $booking->id }} - User: {{ $booking->user_id }}, Car: {{ $booking->car_id }}
            {{-- <a href="{{ route('bookings.edit', $booking) }}">Edit</a> --}}
        </li>
    @endforeach
</ul>
