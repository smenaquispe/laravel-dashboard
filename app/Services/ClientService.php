<?php

namespace App\Services;

use App\Models\Client;
use App\Exceptions\ClientListIsEmpty;

class ClientService
{
    public function getAllClients()
    {
        $clients = Client::list();
        if ($clients->isEmpty()) {
            throw new ClientListIsEmpty();
        }

        return $clients;
    }
}