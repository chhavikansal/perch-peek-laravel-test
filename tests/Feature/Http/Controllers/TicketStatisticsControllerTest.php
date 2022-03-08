<?php

namespace Http\Controllers;

use App\Models\Tickets;
use Database\Factories\TicketsFactory;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TicketStatisticsControllerTest extends TestCase
{
    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testTicketStats()
    {
        $factory = new TicketsFactory();
        $factory->create([
            'user_name' => "test",
            'email' => "test@test.com",
            'subject' => "test ticket",
            'content' => "test ticket",
            'status' => 0
        ]);
        $factory->create([
            'user_name' => "test",
            'email' => "test@test.com",
            'subject' => "test ticket",
            'content' => "test ticket",
            'status' => 1
        ]);

        $stats = [
            "totalCount" => Tickets::all()->count(),
            "unprocessedCount" => Tickets::where('status', 0)->count(),
            "userName" => DB::table('tickets')->groupBy('email')
                ->orderByRaw('count(id) DESC')->value('user_name'),
            "lastProcessTime" => Tickets::where('status', 1)
                ->orderBy('updated_at', 'desc')->first()->value('updated_at')
        ];

        $this->get('/stats')
            ->assertViewIs('statistics')
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
