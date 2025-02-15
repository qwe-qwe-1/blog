<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    protected $model;

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->model::query();
    }
}