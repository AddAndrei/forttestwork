<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
