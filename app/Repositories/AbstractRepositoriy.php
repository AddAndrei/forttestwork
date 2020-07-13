<?php


namespace App\Repositories;


abstract class AbstractRepositoriy
{
    /**
     * Экземпляр сущности
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
     * создаем экзэмпляр класса
     * @return mixed
     */
    abstract protected function getModel();

    /**
     * работаем с его клоном
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }

}
