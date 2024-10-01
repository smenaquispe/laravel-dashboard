<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Client;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    public function test_client_can_be_instantiated()
    {
        $client = Client::factory()->create();
        $this->assertNotNull($client);
        $this->assertInstanceOf(Client::class, $client);
    }

    public function test_client_get_list_clients()
    {
        Client::factory()->count(5)->create();
    
        $response = $this->get('/api/clients');
        
        $response->assertStatus(200);
    }
}
