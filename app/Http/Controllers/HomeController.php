<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::all()->map(function ($car) {
            $car->availability_calendar = str_replace(['"', '\\'], '', $car->availability_calendar);
            return $car;
        });
        return view('welcome', compact('cars'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $cars = Car::where('model', 'LIKE', "%{$query}%")
            ->orWhere('year', 'LIKE', "%{$query}%")
            ->orWhere('pick_up_location', 'LIKE', "%{$query}%")
            ->get();

        return view('cars.search_result', compact('cars'));
    }
}
