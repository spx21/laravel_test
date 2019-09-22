<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id','ProductID','Title', 'Description', 'Image','Category','SubCategory','Price','Quantity','QuantityPurchase','TimePurchase'
    ];
}
