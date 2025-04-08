<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index($car_id)
    {
        $car = Car::find($car_id);
        return view("bookings.create", compact("car"));
    }
    public function list()
    {
        $bookings = Booking::where('user_id', auth()->user()->id)->with('user', 'car')->get();
        return view("bookings.index", compact("bookings"));
    }

    public function bookingshow($car_id)
    {
        $car = Car::find($car_id);
        return view("bookings.create", compact("car"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'car_id' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Booking::create($validated);
        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }
}
