<?php

namespace App\Observers;

use App\Contracts\HasRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelObserver
 * @package App\Observers
 * @author Vi Nguyen <vinguyen.dev@gmail.com>
 */

class ModelObserver
{

    private function handleModelEvent(Model $model, $event = 'saved')
    {
        if ($model instanceof HasRepository) {
            $repository = $model->getRepositoryInstance();
            $repository->handleModelEvent($model, $event);
        }
    }

    /**
     * @param Model $model
     */
    public function retrieved(Model $model)
    {
        $this->handleModelEvent($model, 'retrieved');
    }

    /**
     * @param Model $model
     */
    public function creating(Model $model)
    {
        $this->handleModelEvent($model, 'creating');
    }

    /**
     * @param Model $model
     */
    public function created(Model $model)
    {
        $this->handleModelEvent($model, 'created');
    }

    /**
     * @param Model $model
     */
    public function updating(Model $model)
    {
        $this->handleModelEvent($model, 'updating');
    }

    /**
     * @param Model $model
     */
    public function updated(Model $model)
    {
        $this->handleModelEvent($model, 'updated');
    }

    /**
     * @param Model $model
     */
    public function saving(Model $model)
    {
        $this->handleModelEvent($model, 'saving');
    }

    /**
     * @param Model $model
     */
    public function saved(Model $model)
    {
        $this->handleModelEvent($model, 'saved');
    }

    /**
     * @param Model $model
     */
    public function deleting(Model $model)
    {
        $this->handleModelEvent($model, 'deleting');
    }

    /**
     * @param Model $model
     */
    public function deleted(Model $model)
    {
        $this->handleModelEvent($model, 'deleted');
    }

    /**
     * @param Model $model
     */
    public function restoring(Model $model)
    {
        $this->handleModelEvent($model, 'restoring');
    }

    /**
     * @param Model $model
     */
    public function restored(Model $model)
    {
        $this->handleModelEvent($model, 'restored');
    }

    /**
     * @param Model $model
     */
    public function forceDeleted(Model $model)
    {
        $this->handleModelEvent($model, 'forceDeleted');
    }

}
