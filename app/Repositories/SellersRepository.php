<?php


namespace App\Repositories;
use App\Interfaces\ModelsInterface;
use App\Models\Seller as Model;

class SellersRepository extends AbstractRepositoriy implements ModelsInterface
{
    /**
     * @return mixed|string
     */
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

    public function saveSeller($data)
    {
        return $this->startConditions()
            ->create([
               'title' => $data['fio'],
               'address' => $data['address'],
               'phone'  => $data['phone'],
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
            ->orWhere('address','LIKE',"%{$str}%")
            ->orWhere('phone','LIKE',"%{$str}%")
            ->orWhere('website','LIKE',"%{$str}%")
            ->get();
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
               'address' => $data['address'],
               'phone' => $data['phone'],
               'website' => $data['website']
            ]);

    }
    /**
     * @param $id
     */
    public function dropById($id)
    {
        $this->startConditions()
            ->where('id',$id)
            ->delete();
    }
}
