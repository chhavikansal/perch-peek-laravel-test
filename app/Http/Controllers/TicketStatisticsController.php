<?php

namespace App\Http\Controllers;

use App\Repositories\TicketsRepository;
use Illuminate\Http\Response;

class TicketStatisticsController extends Controller
{
    /**
     * @var TicketsRepository
     */
    private $ticketsRepository;

    /**
     * @param TicketsRepository $ticketsRepository
     */
    public function __construct(TicketsRepository $ticketsRepository)
    {
        $this->ticketsRepository = $ticketsRepository;
    }

    /**
     * Display a listing for un-processed tickets.
     *
     */
    public function index(): Response
    {
        $totalCount = $this->ticketsRepository->getTotalCount();
        $totalUnprocessed = $this->ticketsRepository->getTotalCountBy('status', 0);
        $userName = $this->ticketsRepository->getUserName();
        $lastProcessTime = $this->ticketsRepository->lastProcessTime();

        $stats = [
            "totalCount" => $totalCount,
            "unprocessedCount" => $totalUnprocessed,
            "userName" => $userName,
            "lastProcessTime" => $lastProcessTime
        ];
        
        return response()->view('statistics', compact('stats'));
    }
}
