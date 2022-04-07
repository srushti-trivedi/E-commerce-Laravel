<?php

namespace App\Modules\Frontend\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Product\Models\Product;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
    	'user_id',
    	'product_id',
    	'quantity',
    ];

    public function products()
    {
    	return $this->belongsTo(Product::class,'product_id','id');
    }
}
