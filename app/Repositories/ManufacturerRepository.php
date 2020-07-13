<?php


namespace App\Repositories;
use App\Interfaces\ModelsInterface;
use App\Models\Manufacturer as Model;

class ManufacturerRepository extends AbstractRepositoriy implements ModelsInterface
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
                'title' => $data['title'],
                'country' => $data['country'],
                'website' => $data['website']
            ]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function dropById($id)
    {
        $models = app(\App\Models\Model::class);
        $models->where('manufacturer_id',$id)->delete();
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
                'country' => $data['country'],
                'website' => $data['website']
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
            ->orWhere('country','LIKE',"%{$str}%")
            ->orWhere('website','LIKE',"%{$str}%")
            ->get();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->startConditions()->all();
    }








}
