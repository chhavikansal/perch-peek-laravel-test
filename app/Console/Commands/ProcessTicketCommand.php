<?php

namespace App\Console\Commands;

use App\Models\Tickets;
use Illuminate\Console\Command;

class ProcessTicketCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:ticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command processes a ticket in every 5 minutes';

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
     * @return void
     */
    public function handle()
    {
        $ticket = Tickets::where('status', 0)
                            ->orderBy('created_at', 'asc')
                            ->first();

        if ($ticket == null) {
            $this->info('No un-processed ticket has been found');
            return;
        }

        Tickets::where('id', $ticket->id)
            ->update(['status' => 1]);

        $this->info('Ticket has been processed successfully');
    }
}
