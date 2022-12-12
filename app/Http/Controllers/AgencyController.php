<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgencyRequest;
use App\Http\Requests\UpdateAgencyRequest;
use App\Models\Agency;
use Spatie\QueryBuilder\QueryBuilder;

class AgencyController extends Controller
{
    public function index()
    {
        return QueryBuilder::for(Agency::class)
            ->select(['id', 'name'])
            ->with('location')
            ->get();
    }

    public function store(StoreAgencyRequest $request)
    {
        $agency = $request->validated();
        $agency['logo'] = $request->file('logo')->store('images/logos');
        Agency::create($agency);
        return response()->json(['message' => 'Agency created successfully'], 201);
    }

    public function update(UpdateAgencyRequest $request, Agency $agency)
    {
        $agency->update($request->validated());
        return response()->json(['message' => 'Agency updated successfully'], 200);
    }

    public function destroy(Agency $agency)
    {
        $agency->delete();
        return response()->json(['message' => 'Agency deleted successfully'], 200);
    }
}
