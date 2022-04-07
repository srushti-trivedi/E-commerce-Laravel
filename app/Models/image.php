<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Product\Models\Product;


class image extends Model
{
    use HasFactory;
    protected $fillable=[
    	'image',
    	'product_id',
    ];

    public function products(){
    	return $this->belongsTo(Product::class);
    }
}
