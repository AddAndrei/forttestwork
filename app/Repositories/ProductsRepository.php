<?php


namespace App\Repositories;
use App\Interfaces\ModelsInterface;
use App\Models\Product as Model;



class ProductsRepository extends AbstractRepositoriy implements ModelsInterface
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
            ->get();

    }

    /**
     * @param $count
     * @return mixed
     */
    public function paginate($count)
    {
        return $this->startConditions()
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
                'title' => $data['title']
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
                'title' => $data['fio'],
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
            ->get();
    }

    /**
     * все записи
     * @return mixed
     */
    public function getAll()
    {
        return $this->startConditions()->all();
    }
}
