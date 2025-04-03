<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
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
