<?php

namespace Http\Controllers;

use App\Models\Tickets;
use Database\Factories\TicketsFactory;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TicketsControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testOpenTickets()
    {
        $factory = new TicketsFactory();
        $factory->create([
            'user_name' => "test",
            'email' => "test@test.com",
            'subject' => "test ticket123",
            'content' => "test ticket",
            'status' => 0
        ]);
        DB::table('tickets')->where('status', 0)
            ->orderBy("created_at", 'desc')->limit(1)->get()->toArray();

        $this->get('/tickets/open')
            ->assertViewIs('tickets')
            ->assertStatus(200);
    }

    public function testClosedTickets()
    {
        $factory = new TicketsFactory();
        $factory->create([
            'user_name' => "test",
            'email' => "test@test.com",
            'subject' => "test ticket",
            'content' => "test ticket",
            'status' => 1
        ]);
        DB::table('tickets')->where('status', 1)
            ->orderBy("created_at", 'desc')->get()->toArray();
        $this->get('/tickets/closed')
            ->assertViewIs('tickets')
            ->assertStatus(200);
    }

    public function testUserTickets()
    {
        $factory = new TicketsFactory();
        $factory->create([
            'user_name' => "test",
            'email' => "test@test.com",
            'subject' => "test ticket",
            'content' => "test ticket",
            'status' => 1
        ]);
        DB::table('tickets')->where('email', "test@test.com")->get()->toArray();
        $this->get('users/test@test.com/tickets/')
            ->assertViewIs('userTickets')
            ->assertStatus(200);
    }

    /**
     * @return void
     */
    public function tearDown(): void
    {
        Tickets::where('email', 'test@test.com')->delete();

        parent::tearDown();
    }
}
