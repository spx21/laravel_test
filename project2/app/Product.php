<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'id','Title', 'Description', 'Image','Category','SubCategory','Price','Quantity'
    ];
}
