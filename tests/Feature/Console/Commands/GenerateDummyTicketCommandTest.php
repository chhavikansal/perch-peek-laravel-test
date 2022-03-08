<?php

namespace Console\Commands;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class GenerateDummyTicketCommandTest extends TestCase
{
    public function testShouldCallCommand()
    {
        Artisan::call('generate:ticket');

        $this->assertStringContainsString(
            "Dummy ticket has been created",
            Artisan::output()
        );
    }

}
