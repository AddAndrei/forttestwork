<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Model as productModel;

class PriceList extends Model
{
    //
    protected $fillable = [
        'seller_id', 'manufacturer_id', 'product_id', 'model_id', 'price'
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getManufacturer()
    {
        return $this->belongsTo(Manufacturer::class,'manufacturer_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getSeller()
    {
        return $this->belongsTo(Seller::class,'seller_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getModel()
    {
        return $this->belongsTo(productModel::class,'model_id','id');
    }
}
