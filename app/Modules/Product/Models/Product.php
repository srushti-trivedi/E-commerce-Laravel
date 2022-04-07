<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\image;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function image()
    {
    	return $this->hasMany(image::class);
    }
}

// $brands = Brand::join('users','users.id','=','brands.user_id')->where('status',array('Y'))->get(['brands.*','users.user_name']);
