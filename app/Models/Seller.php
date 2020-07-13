<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //
    protected $fillable = [
        'title',
        'address',
        'phone',
        'website'
    ];
    public $timestamps = false;
}
