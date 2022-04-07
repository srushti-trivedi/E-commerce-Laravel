<?php

namespace App\Modules\Shipping\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = [
    	'fname',
		'lname',
		'email',
		'city',
		'state',
		'zipcode',
		'country',
		'phone_no',
		'user_id',
    ];

}
