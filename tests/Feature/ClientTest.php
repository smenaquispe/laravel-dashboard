<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Middleware\TimeMiddleware;
use App\Exceptions\OutsideWorkingHours;
use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Http\Request;


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

    public function it_throws_exception_outside_working_hours()
    {
        Carbon::setTestNow(Carbon::create(2024, 10, 1, 19));

        $this->expectException(OutsideWorkingHours::class);

        $middleware = new TimeMiddleware();
        $request = Request::create('/'); 
        $middleware->handle($request, function () {
            return response('This will not be reached.');
        });
    }

    public function it_throws_exception_before_working_hours()
    {
        Carbon::setTestNow(Carbon::create(2024, 10, 1, 8)); 

        $this->expectException(OutsideWorkingHours::class);

        $middleware = new TimeMiddleware();
        $request = Request::create('/'); 
        $middleware->handle($request, function () {
            return response('This will not be reached.');
        });
    }
}
