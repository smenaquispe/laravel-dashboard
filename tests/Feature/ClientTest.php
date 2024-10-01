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
}
