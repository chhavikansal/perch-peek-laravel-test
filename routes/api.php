<?php

use App\Http\Controllers\TicketsController;
use App\Http\Controllers\TicketStatisticsController;
use Illuminate\Support\Facades\Route;

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$router->get(
    '/tickets/open',
    [
        'uses' => TicketsController::class . '@openTickets',
    ]
);

$router->get(
    '/tickets/closed',
    [
        'uses' => TicketsController::class . '@closedTickets',
    ]
);

$router->get(
    '/users/{email}/tickets',
    [
        'uses' => TicketsController::class . '@userTickets',
    ]
);

$router->get(
    '/stats',
    [
        'uses' => TicketStatisticsController::class . '@index',
    ]
);
