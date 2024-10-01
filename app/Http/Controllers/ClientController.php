<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Client;
use App\Services\ClientService;
use App\Exceptions\ClientListIsEmpty;

class ClientController extends Controller
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index()
    {
        try {
            $clients = $this->clientService->getAllClients();
            return response()->json($clients);
        } catch (ClientListIsEmpty $e) {
            return response()->json(['message' => 'No clients found'], 404);
        }
    }

    public function showView()
    {
        return view('clients');
    }
}
