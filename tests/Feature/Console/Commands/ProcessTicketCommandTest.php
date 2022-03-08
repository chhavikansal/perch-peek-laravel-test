<?php

namespace Console\Commands;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ProcessTicketCommandTest extends TestCase
{
    public function testShouldCallCommand()
    {
        Artisan::call('process:ticket');

        $this->assertStringContainsString(
            "Ticket has been processed successfully",
            Artisan::output()
        );
    }

}
