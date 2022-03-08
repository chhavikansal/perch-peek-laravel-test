<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class TicketStatisticsController extends Controller
{
    /**
     * Display a listing for un-processed tickets.
     *
     */
    public function index(): Response
    {
        $stats = [
            "totalCount" => Tickets::all()->count(),
            "unprocessedCount" => Tickets::where('status', 0)->count(),
            "userName" => DB::table('tickets')->groupBy('email')
                ->orderByRaw('count(id) DESC')->value('user_name'),
            "lastProcessTime" => Tickets::where('status', 1)
                ->orderBy('updated_at', 'desc')->first()->value('updated_at')
        ];

        return response()->view('statistics', compact('stats'));
    }
}
