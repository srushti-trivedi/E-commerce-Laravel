<?php

namespace App\Modules\Shipping\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Product\Models\Product;
use App\Modules\Shipping\Models\Shipping;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
		'billing_id',
		'shipping_id',
		'payment_id',
		'total_price',
		'quantity',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function shippings()
    {
        return $this->belongsTo(Shipping::class,'billing_id','id');
    }
}
