<?php

namespace Database\Seeders;

use App\Models\Tickets;
use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Initially when db:seed artisan run it enter 100 records in DB
     * Else whenever schedule job runs it enter 1 record in DB
     *
     * @return void
     */
    public function run(int $count=100)
    {
        Tickets::factory($count)->create();
    }
}
