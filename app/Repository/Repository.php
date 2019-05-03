<?php

namespace Repository;

use Illuminate\Support\Collection;

abstract class Repository
{
    /**
     * Define repository modal
     *
     * @like[User::class]
     */
    abstract public function model();

    /**
     * Get all list from model
     *
     * @return Collection
     */
    public function getAll()
    {
        return $this->model()::get();
    }

    /**
     * Create modal collection
     *
     * @param $request
     * @return bool|Object
     */
    public function create($request)
    {
        if (empty($request)) {
            return false;
        }
        return $this->model()::create($request);
    }

    /**
     * Find Row id form model list
     *
     * @param $primaryKey
     * @return Object
     */
    public function find($primaryKey)
    {
        return $this->model()::find($primaryKey);
    }

    /**
     * Find Row id form model list
     *
     * @param $primaryKey
     * @return Object
     */
    public function findOrFail($primaryKey)
    {
        return $this->model()::findOrFail($primaryKey);
    }

    /**
     * Update model
     *
     * @param integer $primaryKey
     * @param $request
     * @return bool|Object
     */
    public function update($primaryKey, $request)
    {
        if (empty($primaryKey) || empty($request)) {
            return false;
        }

        if ($this->findOrFail($primaryKey)->update($request)) {
            return $this->find($primaryKey);
        }
        return false;
    }

    /**
     * Delete a row form collection
     *
     * @param int $primaryKey
     * @return boolean
     */
    public function delete($primaryKey)
    {
        return $this->find($primaryKey)->delete();
    }
}
