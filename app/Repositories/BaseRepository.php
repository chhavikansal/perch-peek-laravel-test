<?php

namespace App\Repositories;

use App\Contracts\Repositories\RepositoryInterface;
use App\Exceptions\Repositories\InvalidModelException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseRepository implements RepositoryInterface
{
    /** @var Model */
    public $model;
    /** @var App */
    protected $app;

    /**
     * Instantiate the Model during Repository initialisation
     *
     * @param App $app
     *
     * @throws InvalidModelException
     * @throws BindingResolutionException
     */
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->setModel();
    }

    /**
     * The Model class name. This needs to be defined for every
     * repository that extends BaseRepository.
     *
     * @return string
     */
    abstract public function model(): string;

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model::all();
    }

    /**
     * Paginate the results
     *
     * @param int $perPage
     * @param array $columns
     *
     * @return mixed
     */
    public function paginate($perPage = 50, array $columns = ['*'])
    {
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * Update a model by id
     *
     * @param array $data
     * @param $id
     *
     * @return bool
     */
    public function update(array $data, $id): bool
    {
        $model = $this->model->findOrFail($id);
        $model->fill($data);

        return $model->save();
    }

    /**
     * Find a model by id
     *
     * @param $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, array $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * Find a model by a given attribute and value
     *
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function findBy($column, $value)
    {
        return $this->model->where($column, $value);
    }

    /**
     * Instantiate model
     *
     * @return Model
     * @throws InvalidModelException|BindingResolutionException
     */
    protected function setModel(): Model
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new InvalidModelException(
                trans(
                    'exceptions.repositories.invalid_model',
                    ['model' => get_class($model)]
                )
            );
        }

        return $this->model = $model;
    }
}
