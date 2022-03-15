<?php

namespace App\Contracts\Repositories;

interface TicketsRepositoryInterface
{
    public function getTotalCount() : int;

    public function getTotalCountBy($column, $value) : int;

    public function getUserName() : string;

    public function lastProcessTime();

    public function getUnprocessedTicket();
}
