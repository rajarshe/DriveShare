<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create($booking_id)
    {
        $booking = User::findOrFail($booking_id);

        // if ($booking->review) {
        //     return redirect()->back()->with('error', 'Review already submitted.');
        // }
        $reviews = Review::where('user_id', $booking->id)->get();

        return view('reviews.create', compact('booking', 'reviews'));
    }

    public function store(Request $request, $booking_id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $booking = Booking::findOrFail($booking_id);

        Review::create([
            'booking_id' => $booking->id,
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('booking.list')->with('success', 'Thank you for your review!');
    }
}
