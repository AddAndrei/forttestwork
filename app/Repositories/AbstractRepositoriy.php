<?php


namespace App\Repositories;


abstract class AbstractRepositoriy
{
    /**
     * Model
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $model;

    /**
     * AbstractRepositoriy constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModel());
    }

    /**
     * @return mixed
     */
    abstract protected function getModel();

    /**
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }

}
