<?php

namespace App\Repositories;

use App\Models\Tickets;
use App\Contracts\Repositories\TicketsRepositoryInterface;

class TicketsRepository extends BaseRepository implements TicketsRepositoryInterface
{
    /**
     * @return int
     */
    public function getTotalCount(): int
    {
        return Tickets::all()->count();
    }

    /**
     * @param $column
     * @param $value
     * @return int
     */
    public function getTotalCountBy($column, $value): int
    {
        return Tickets::where($column, $value)->count();
    }

    public function getUserName(): string
    {
        return (
            Tickets::groupBy('email')
            ->selectRaw('count(*) as total, user_name')
            ->orderBy('total', 'desc')
            ->first()->user_name
        );
    }

    public function lastProcessTime()
    {
        return (
            Tickets::where('status', 1)
                ->orderBy('updated_at', 'desc')
                ->first()
                ->value('updated_at')
        );
    }

    public function getUnprocessedTicket()
    {
        return (
            Tickets::where('status', 0)
                ->orderBy('created_at', 'asc')
                ->first()
        );
    }

    public function model(): string
    {
        return Tickets::class;
    }
}
