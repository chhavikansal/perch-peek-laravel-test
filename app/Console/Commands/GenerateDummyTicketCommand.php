<?php

namespace App\Console\Commands;

use Database\Seeders\DummyDataSeeder;
use Illuminate\Console\Command;

class GenerateDummyTicketCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:ticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to enter one dummy ticket in DB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param DummyDataSeeder $seeder
     * @return void
     */
    public function handle(DummyDataSeeder $seeder)
    {
        $seeder->run(1);
        $this->info('Dummy ticket has been created');
    }
}
