<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Spatie\QueryBuilder\QueryBuilder;

class ClientController extends Controller
{

    public function index()
    {
        return QueryBuilder::for(Client::class)
            ->paginate();
    }

    public function store(StoreClientRequest $request)
    {
        Client::create($request->validated());
        return response()->json(['message' => 'Client created successfully'], 201);
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());
        return response()->json(['message' => 'Client updated successfully'], 200);
    }


    public function destroy(Client $client)
    {
        $client->delete();
        return response()->json(['message' => 'Client deleted successfully'], 200);
    }
}
