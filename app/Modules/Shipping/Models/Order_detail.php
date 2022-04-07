<?php

namespace App\Modules\Shipping\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Product\Models\Product;
use App\Modules\Shipping\Models\Order;
use App\Models\User;

class Order_detail extends Model
{
    use HasFactory;

    protected $fillable = [
    	'order_id',
        'user_id',
		'product_id',
		'total_price',
		'quantity',
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
