<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::all()->take(6)->map(function ($car) {
            $car->availability_calendar = str_replace(['"', '\\'], '', $car->availability_calendar);
            return $car;
        });
        return view('welcome', compact('cars'));
    }
}
