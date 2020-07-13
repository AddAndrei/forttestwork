<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Model as Models;
class Manufacturer extends Model
{
    //
    protected $fillable = [
        'title',
        'country',
        'website'
    ];

    public $timestamps = false;


}
