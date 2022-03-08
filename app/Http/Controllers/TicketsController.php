<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Response;

class TicketsController extends Controller
{
    /**
     * Display a listing for unprocessed tickets.
     *
     * @return Response
     */
    public function openTickets(): Response
    {
        $ticketsData = Tickets::where('status', 0)->paginate(20);
        return response()->view('tickets', compact('ticketsData'));
    }

    /**
     * Display a listing for processed tickets.
     *
     * @return Response
     */
    public function closedTickets(): Response
    {
        $ticketsData = Tickets::where('status', 1)->paginate(20);
        return response()->view('tickets', compact('ticketsData'));
    }

    /**
     * Display Tickets on the basis of email id
     *
     * @param $email
     * @return Response
     */
    public function userTickets($email): Response
    {
        $ticketsData = Tickets::where('email', $email)->paginate(20);
        return response()->view('userTickets', compact('ticketsData'));
    }
}
