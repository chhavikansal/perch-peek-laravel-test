<?php

namespace App\Console\Commands;

use App\Models\Tickets;
use App\Repositories\TicketsRepository;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
     * @var TicketsRepository
     */
    private $ticketsRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(TicketsRepository $ticketsRepository)
    {
        parent::__construct();
        $this->ticketsRepository = $ticketsRepository;
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $ticket = $this->ticketsRepository->getUnprocessedTicket();
        } catch (ModelNotFoundException $e) {
            $this->error($e->getMessage());
            return;
        }

        if ($ticket === null) {
            $this->info('No un-processed ticket has been found');
        } else {
            $data = ["status" => 1];

            $this->ticketsRepository->update($data, $ticket->id);
            $this->info('Ticket has been processed successfully');
        }
        return;
    }
}
