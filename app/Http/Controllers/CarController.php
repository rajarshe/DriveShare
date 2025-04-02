<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all()->map(function ($car) {
            $car->availability_calendar = str_replace(['"', '\\'], '', $car->availability_calendar);
            return $car;
        });
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'model' => 'required|string',
            'year' => 'required|integer',
            'mileage' => 'required|integer',
            'availability_calendar' => 'required',
            'pick_up_location' => 'required|string',
            'rental_pricing' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif',
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('cars', 'public') : null;

        $car = new Car();
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->mileage = $request->input('mileage');
        $car->availability_calendar = json_encode($request->input('availability_calendar'));
        $car->pick_up_location = $request->input('pick_up_location');
        $car->rental_pricing = $request->input('rental_pricing');
        $car->image = $imagePath;
        $car->save();
        return redirect()->route('cars.index')->with('success', 'Car added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
