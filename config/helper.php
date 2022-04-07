<?php

use App\Modules\Shipping\Models\Shipping;


function getBillingAddress($id = '')
{
    $billing_address =Shipping::where('id',$id)->get();
    return $billing_address;
}
function getShippingAddress($id = '')
{
    $shipping_address =Shipping::where('id',$id)->get();
    return $shipping_address;
}