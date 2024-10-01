<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    public function test_example(): void
    {
        $view = $this->view('welcome', ['name' => 'sergio']);
        $view->assertSee('sergio');
    }
}