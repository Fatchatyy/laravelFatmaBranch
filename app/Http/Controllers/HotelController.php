<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|string',
            'localisation' => 'required|string|max:255',
            'certification' => 'nullable|string|max:255',
        ]);

        // Create a new Hotel instance and save it to the database
        $hotel = new Hotel;
        $hotel->name = $validatedData['name'];
        $hotel->description = $validatedData['description'];
        $hotel->localisation = $validatedData['localisation'];
        $hotel->certification = $validatedData['certification'];
        $hotel->save();

        // Redirect to the hotels list page or show success message
        return redirect()->route('properties')->with('success', 'Hotel created successfully!');
    } 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'localisation' => 'required|string|max:255',
            'certification' => 'nullable|string|max:255',
        ]);

        $hotel->update($request->all());

        return redirect()->route('properties')->with('success', 'Hotel updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();

        return redirect()->route('properties')->with('success', 'Hotel deleted successfully!');
    }
}
