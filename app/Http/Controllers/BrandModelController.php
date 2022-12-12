<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandModelRequest;
use App\Http\Requests\UpdateBrandModelRequest;
use App\Models\BrandModel;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class BrandModelController extends Controller
{
    public function index()
    {
        return QueryBuilder::for(BrandModel::class)
            ->allowedFilters([AllowedFilter::exact('brand_id')])
            ->select(['id', 'name'])
            ->get();
    }

    public function store(StoreBrandModelRequest $request)
    {
        BrandModel::create($request->validated());
        return response()->json(['message' => 'BrandModel created successfully']);
    }

    public function update(UpdateBrandModelRequest $request, BrandModel $brandModel)
    {
        $brandModel->update($request->validated());
        return response()->json(['message' => 'BrandModel updated successfully']);
    }

    public function destroy(BrandModel $brandModel)
    {
        $brandModel->delete();
        return response()->json(['message' => 'BrandModel deleted successfully']);
    }
}
