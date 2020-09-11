<?php

namespace App\Repositories;

use Illuminate\Cache\Repository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;

/**
 * Abstract BaseRepository
 * @package App\Repositories
 * @author Vi Nguyen <vinguyen.dev@gmail.com>
 */

abstract class BaseRepository extends Repository {

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var string
     */
    protected $table;

    /**
     * @var null|Model
     */
    protected $instanceWithTrash = null;

    /**
     * @var null|Model
     */
    protected $instanceWithoutTrash = null;

    /**
     * @return Model
     */
    protected function getModel()
    {
        return $this->model;
    }

    /**
     * @return Builder|SoftDeletes
     */
    protected function query()
    {
        return $this->getModel()->newQuery();
    }

    /**
     * @return string
     */
    public function getTable()
    {
        if (!$this->table) {
            $this->table = $this->getModel()->getTable();
        }

        return $this->table;
    }

    /**
     * @param Model $model
     * @param string $event
     */
    public function handleModelEvent(Model $model, $event = 'saved')
    {
        /**
         * fire model event handle method if exists
         */
        $method = 'onModel' . ucfirst($event);
        if (method_exists($this, $method)) {
            $this->$method($model);
        }

        /**
         * clear cache of current tag
         */
        if ($event !== 'retrieved') {
            $this->flush();
        }
    }

    /**
     * @param $attributes
     * @return Model
     */
    public function create($attributes)
    {
        return $this->query()->create($attributes);
    }

    /**
     * @param array $attributes
     * @param array $value
     * @return Builder|Model
     */
    public function updateOrCreate($attributes, $value)
    {
        return $this->query()->withTrashed()->updateOrCreate($attributes, $value);
    }

    /**
     * @param $attributes
     * @param $value
     * @return Builder|Model
     */
    public function firstOrCreate($attributes, $value = [])
    {
        return $this->query()->withTrashed()->firstOrCreate($attributes, $value);
    }

    /**
     * @return string
     */
    public function getKeyName()
    {
        return $this->getModel()->getKeyName();
    }

    /**
     * @param $id
     * @return Builder|Model
     */
    public function findById($id)
    {
        if (!$this->instanceWithTrash) {
            $this->instanceWithTrash = $this->query()
                ->withTrashed()
                ->where($this->getKeyName(), $id)
                ->firstOrFail();
        }

        return $this->instanceWithTrash;
    }

    /**
     * @param $id
     * @return Builder|Model
     */
    public function findAvailableById($id)
    {
        if (!$this->instanceWithoutTrash) {
            $this->instanceWithoutTrash = $this->query()
                ->where($this->getKeyName(), $id)
                ->firstOrFail();
        }

        return $this->instanceWithoutTrash;
    }

    /**
     * @param string $id
     * @return bool|void
     * @throws Exception
     */
    public function delete($id)
    {
        /** @var Model $model */
        $model = $this->findById($id);

        $model->delete();
    }

    /**
     * @param $id
     */
    public function restore($id)
    {
        /** @var SoftDeletes $model */
        $model = $this->findById($id);

        try {
            $model->restore();
        } catch (\Throwable $exception) {

        }
    }

}
