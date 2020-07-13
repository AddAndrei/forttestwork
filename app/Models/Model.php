<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use App\Models\Manufacturer;
class Model extends BaseModel
{
    //
    protected $fillable = [
        'title', 'manufacturer_id'
    ];
    public $timestamps = false;

    public function getManufacturer()
    {
        return $this->belongsTo(Manufacturer::class,'manufacturer_id','id');

    }
}
