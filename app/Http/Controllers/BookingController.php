<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use App\Models\Notification;
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
        $your_car_list = Car::where('user_id', auth()->id())->pluck('id');
        $your_car_bookings = Booking::whereIn('user_id', $your_car_list)->with('user', 'car')->get();
        // dd($your_car_booked, auth()->user()->id);
        return view("bookings.index", compact("bookings", "your_car_bookings"));
    }

    public function bookingshow($car_id)
    {
        $car = Car::find($car_id);
        return view("bookings.create", compact("car"));
    }

    public function store(Request $request)
    {
        // dd("hello");
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'car_id' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $booking = Booking::create($validated);

        // notification create for vendor
        $vendor_notficationData = [
            'user_id' => Car::where('id', $booking->car_id)->value('user_id'),
            'booking_id' => $booking->id,
            'title' => 'New Booking Received',
            'message' => 'Your car has been booked from ' . $booking->start_date . ' to ' . $booking->end_date . '.',
        ];
        $vendor_notification = $this->notificationCreate($vendor_notficationData);

        // notification create for user
        $user_notficationData = [
            'user_id' => auth()->user()->id,
            'booking_id' => $booking->id,
            'title' => 'Booking Confirmed',
            'message' => 'Your booking has been successfully placed from ' . $booking->start_date . ' to ' . $booking->end_date . '.',
        ];
        $user_nonification = $this->notificationCreate($user_notficationData);

        return redirect()->route('booking.payment')->with('success', 'Booking created successfully.');
    }

    public function paymentPage()
    {
        return view("bookings.payment");
    }

    function notificationCreate($req)
    {
        $data = [
            'user_id' => $req['user_id'],
            'booking_id' => $req['booking_id'],
            'title' => $req['title'],
            'message' => $req['message'],
        ];

        $notification = Notification::create($data);

        return $notification;
    }
}
