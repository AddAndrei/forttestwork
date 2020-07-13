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
            ->with(['getSeller','getProduct','getModel'])
            ->get();
    }

    /**
     * @param $count
     * @return mixed
     */
    public function paginate($count)
    {
        return $this->startConditions()
            ->with(['getSeller','getProduct','getModel'])
            ->paginate($count);
    }

    /**
     * @param $data
     */
    public function create($data)
    {
        $this->startConditions()
            ->create([
                'seller_id' => (int)$data['seller'],
                'manufacturer_id' => (int)$data['manufacturer'],
                'product_id' => (int)$data['product'],
                'model_id' => (int)$data['model'],
                'price' => $data['price']
            ]);
    }

    /**
     * @param $id
     */
    public function dropById($id)
    {
        $this->startConditions()->where('id',$id)->delete();
    }


}
