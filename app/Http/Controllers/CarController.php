<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Http\Requests\UpdateCarRequest;
use App\Models\Car;
use Spatie\QueryBuilder\QueryBuilder;

class CarController extends Controller
{
    public function index()
    {
        return QueryBuilder::for(Car::class)
            ->paginate();
    }

    public function store(StoreCarRequest $request)
    {
        Car::create($request->validated());
        return response()->json(['message' => 'Car created successfully'], 201);
    }

    public function update(UpdateCarRequest $request, Car $car)
    {
        $car->update($request->validated());
        return response()->json(['message' => 'Car updated successfully'], 200);
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(['message' => 'Car deleted successfully'], 200);
    }
}
