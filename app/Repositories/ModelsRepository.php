<?php


namespace App\Repositories;
use App\Models\Model;

use App\Interfaces\ModelsInterface;

class ModelsRepository extends AbstractRepositoriy implements ModelsInterface
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
            ->where('id',$id)
            ->with(['getManufacturer'])
            ->get();

    }

    /**
     * @param $count
     * @return mixed
     */
    public function paginate($count)
    {
        return $this->startConditions()
            ->with(['getManufacturer'])
            ->paginate($count);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->startConditions()
            ->create([
                'title' => $data['title'],
                'manufacturer_id' => $data['manufacturer']
            ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function dropById($id)
    {
        return $this->startConditions()
            ->where('id',$id)
            ->delete();
    }
    /**
     * @param $data
     * @return mixed
     */
    public function update($data)
    {
        return $this->startConditions()
            ->where('id',$data['id'])
            ->update([
                'title' => $data['title'],
                'manufacturer_id' => $data['manufacturer']
            ]);
    }

    /**
     * @param $str
     * @return mixed
     */
    public function whereLike($str)
    {
        return $this->startConditions()
            ->where('title','LIKE',"%{$str}%")
            ->with(['getManufacturer'])
            ->get();
    }
}
