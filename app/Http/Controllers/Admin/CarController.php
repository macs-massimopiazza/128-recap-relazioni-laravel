<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::all();

        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $accessories = Accessory::orderBy('name')->get();
        return view('admin.cars.create', compact('brands', 'accessories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'model' => 'required|string|max:90',
            'production_year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'hp' => 'required|integer|min:0',
            'fuel' => 'required|string|max:60',
            'image' => 'string|max:255|nullable', // L'immagine è opzionale
            'brand_id' => 'exists:brands,id',
            'accessories' => 'exists:accessories,id',
        ]);

        $car = Car::create($data);

        $car->accessories()->attach($data['accessories']);

        return view('admin.cars.show', compact('car'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);

        return view('admin.cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        $brands = Brand::all();
        $accessories = Accessory::orderBy('name')->get();

        return view('admin.cars.edit', compact('car', 'brands', 'accessories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'model' => 'required|string|max:90',
            'production_year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'hp' => 'required|integer|min:0',
            'fuel' => 'required|string|max:60',
            'image' => 'string|max:255|nullable', // L'immagine è opzionale
            'brand_id' => 'exists:brands,id',
            'accessories' => 'exists:accessories,id'
        ]);;

        $car = Car::find($id);
        $car->update($data);
        $car->accessories()->sync($data['accessories']);

        return view('admin.cars.show', compact('car'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
