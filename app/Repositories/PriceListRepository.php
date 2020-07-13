<?php


namespace App\Repositories;


use App\Interfaces\ModelsInterface;
use App\Models\PriceList as Model;

class PriceListRepository extends AbstractRepositoriy implements ModelsInterface
{

    protected function getModel()
    {
        // TODO: Implement getModel() method.
        return Model::class;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        // TODO: Implement getById() method.
        return $this->startConditions()
            ->where('id', $id)
            ->with(['getManufacturer','getSeller','getProduct','getModel'])
            ->get();
    }

    /**
     * @param $count
     * @return mixed
     */
    public function paginate($count)
    {
        return $this->startConditions()
            ->with(['getManufacturer','getSeller','getProduct','getModel'])
            ->paginate($count);
    }




}
