<?php

namespace App\Http\Controllers;

use App\Repositories\TicketsRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class TicketsController extends Controller
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
     * Display a listing for processed/unprocessed tickets.
     *
     * @param Request $request
     * @return Response
     */
    public function show(Request $request): Response
    {
        $status = ($request->getPathInfo() === "/tickets/open") ? 0 : 1;

        $fetchData = $this->ticketsRepository
            ->findBy('status', $status)
            ->paginate(15);

        $ticketsData = $this->paginatorToArray($fetchData);

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
        $userData = $this->ticketsRepository
            ->findBy('email', $email)
            ->paginate(15);

        $ticketsData = $this->paginatorToArray($userData);

        return response()->view('userTickets', compact('ticketsData'));
    }

    /**
     * @param LengthAwarePaginator $paginator
     * @param string $dataKey
     *
     * @return array
     */
    protected function paginatorToArray(LengthAwarePaginator $paginator, string $dataKey = 'items'): array
    {
        return [
            'total' => $paginator->total(),
            'perPage' => $paginator->perPage(),
            'currentPage' => $paginator->currentPage(),
            'lastPage' => $paginator->lastPage(),
            'nextPageUrl' => $paginator->nextPageUrl(),
            'prevPageUrl' => $paginator->previousPageUrl(),
            'from' => $paginator->firstItem(),
            'to' => $paginator->lastItem(),
            $dataKey => $paginator->items()
        ];
    }
}
