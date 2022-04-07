<?php

namespace App\Modules\Order\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Shipping\Models\Shipping;
use App\Modules\Shipping\Models\Billing;
use App\Modules\Product\Models\Product;
use App\Modules\Frontend\Models\Cart;
use App\Modules\Shipping\Models\Payment;
use App\Modules\Shipping\Models\Order;
use App\Modules\Shipping\Models\Order_detail;

class OrderController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Order::welcome");
    }

    public function Index()
    {
        $orderView = Order_detail::all();//where('user_id',Auth::id())->get();
        //$orderAdd = Order::where('user_id',Auth::id())->get();
        //return view("Shipping::OrderView",compact("orderView"));
        // $orderView = order::join('payments', 'payments.id', '=', 'orders.payment_id')
        //             ->get(['orders.', 'orders.id as order_id', 'payments.']);
        // return view("Order::OrderView", compact('orderView'));

    	return view("Order::OrderView",compact("orderView"));
    }

    public function invoiceView($id)
    {
        $address = Order::where('orders.id', $id)->join('shippings','shippings.id','=','orders.billing_id')->join('payments', 'payments.id', '=', 'orders.payment_id')->first();
        // $address = Order::where('orders.id',$id)->get();
        $order = Order::where('orders.id', $id)->first();
        $invoice = Order_detail::where('order_id', $id)
                ->join('products', 'products.id', '=', 'order_details.product_id')
                ->join('brands', 'brands.id', '=', 'products.brand_id')
                ->join('colors', 'colors.id', '=', 'products.color_id')
                ->get(['products.*', 'order_details.*', 'brands.brandname', 'colors.name']);
        return view("Order::Invoice", compact('address','order', 'invoice'));
        // return view('Order::Invoice');
    }

}
