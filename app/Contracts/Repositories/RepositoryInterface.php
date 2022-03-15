<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface RepositoryInterface
{
    /**
     * The Model class name.
     *
     * @return string
     */
    public function model(): string;

    /**
     * Get all the models.
     *
     * @param array $columns
     *
     * @return mixed
     */
    public function all(): Collection;

    /**
     * Update a model by id
     *
     * @param array $data
     * @param $id
     *
     * @return bool
     */
    public function update(array $data, $id): bool;

    /**
     * Paginate the results
     *
     * @param int $perPage
     * @param array $columns
     *
     * @return mixed
     */
    public function paginate($perPage = 50, array $columns = ['*']);

    /**
     * Find a model by id
     *
     * @param $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, array $columns = ['*']);

    /**
     * Find a model by a given attribute and value
     *
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function findBy($column, $value);
}
