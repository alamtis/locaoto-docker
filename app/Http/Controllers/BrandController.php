<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Spatie\QueryBuilder\QueryBuilder;

class BrandController extends Controller
{

    public function index()
    {
        return QueryBuilder::for(Brand::class)
            ->paginate();
    }

    public function store(StoreBrandRequest $request)
    {
        // validate brand and store it
        $brand = Brand::create($request->validated());
        return response()->json(['message' => ''], 201);
    }

    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        // update brand
        $brand->update($request->validated());
        return response()->json(['message' => ''], 200);
    }

    public function destroy(Brand $brand)
    {
        // delete the brand
        $brand->delete();
        return response()->json(['message' => ''], 204);
    }
}
