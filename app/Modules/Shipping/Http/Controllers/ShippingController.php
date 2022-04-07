<?php

namespace App\Modules\Shipping\Http\Controllers;

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

class ShippingController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Shipping::welcome");
    }

    public function billingStep()
    {
    	if(Auth::check())
    	{
            $billing = Shipping::all();
    		return view("Shipping::Billing",["billing" => $billing]);
    	}
    	else
    	{
    		return redirect()->back()->with(["status" => "PLEASE LOGIN ..."]);
    	}
    }

    public function addBilling(Request $request)
    {
        // dd($request->shipping_address);
         //dd($request->shipping_method);
    	$billing_id = $shipping_id = '';
        if($request->shipping_address == 'addNewAddress')
        {
            $billing = new Shipping();
            $billing->fname = $request->input('fname');
            $billing->lname = $request->input('lname');
            $billing->email = $request->input('email');
            $billing->city = $request->input('city');
            $billing->state = $request->input('state');
            $billing->zipcode = $request->input('zipcode');
            $billing->country = $request->input('country');
            $billing->phone_no = $request->input('phone_no');
            $billing->user_id = Auth::id();
            $billing->save();
            $billing_id = $billing->id;
            //return view('Shipping::orderData');            
        }      
        else
        {
            $billing_id = $request->shipping_address;
            //return view('Shipping::ShippingAddress',['shipping' => $shipping]); 
        }

        if(isset($request->shipping_method) && $request->shipping_method == 'sameAddress')
        {
            $shipping_id = $billing_id;
        }

        $sessionArray = [
            'billing_id' => $billing_id,
            'shipping_id' => $shipping_id,
        ];
        session()->put('checkout',$sessionArray);

       //  if($request->session()->has('id'))
       //     echo $request->session()->get('id');
       // else
       //     echo 'No data in the session';

        if($request->shipping_method == 'sameAddress')
        {
            //return redirect()->route('orderStep');
            return redirect()->route('paymentStep');
        }
        else
        {
            return redirect()->route('shippingStep');
        }
    }

    public function shippingStep(Request $request)
    {
        //dd($request->session()->get('checkout'));
        $shipping = Shipping::all();
        return view('Shipping::ShippingAddress',['shipping' => $shipping]); 
    }

    public function addShipping(Request $request)
    {
        //dd($request->session()->get('checkout'));
        $billing_id = session()->get('checkout');

        if($request->shipping_address == 'addNewAddress')
        {
            $shipping = new Shipping();
            $shipping->fname = $request->input('fname');
            $shipping->lname = $request->input('lname');
            $shipping->email = $request->input('email');
            $shipping->city = $request->input('city');
            $shipping->state = $request->input('state');
            $shipping->zipcode = $request->input('zipcode');
            $shipping->country = $request->input('country');
            $shipping->phone_no = $request->input('phone_no');
            $shipping->user_id = Auth::id();
            $shipping->save();
            $shipping_id = $shipping->id;
            //return view('Shipping::orderData');            
        }      
        else
        {
            $shipping_id = $request->shipping_address;
            //return view('Shipping::ShippingAddress',['shipping' => $shipping]); 
        }
        $sessionArray = [
        
            'shipping_id' => $shipping_id,
            'billing_id' => $billing_id['billing_id'],
        ];
        session()->put('checkout',$sessionArray);
        //dd(session()->get('checkout'));

        //return redirect()->route('orderStep');
        return redirect()->route('paymentStep');
    }

    public function addPayment(Request $request)
    {
        //dd($request->session()->get('checkout'));
        $payment = new Payment();
        $payment->user_id = Auth::id();
        $payment->first_name = $request->input('first_name');
        $payment->last_name = $request->input('last_name');
        $payment->method = $request->input('payment-radio');
        $payment->save();
        $payment_id = $payment->id;

        $sessionPayment = [
            'payment_id' => $payment_id,
        ];
        session()->put('payment',$sessionPayment);

        return redirect()->route('orderStep');
    }

    public function orderStep(Request $request)
    {
        //dd($request->session()->get('checkout'));
        $getSession = session()->get('checkout');
        $payment = session()->get('payment');
        $billing_id = (int)$getSession['billing_id'];
        $shipping_id = (int)$getSession['shipping_id'];
        $pay_id = (int)$payment['payment_id'];
        //dd($billing_id,$shipping_id);
        $cartProducts = Cart::where('user_id',Auth::id())->get();
        $products = Product::where('user_id',Auth::id())->get();
        $billingAddress = Shipping::where('id',$billing_id)->where('user_id',Auth::id())->get();
        $shippingAddress = Shipping::where('id',$shipping_id)->where('user_id',Auth::id())->get();
        $paymentMethod = Payment::where('id',$pay_id)->where('user_id',Auth::id())->get();
        //dd($billingAddress);
       
        return view("Shipping::orderData",['products'=>$products,'cartProducts'=>$cartProducts,'billingAddress'=> $billingAddress, 'shippingAddress'=> $shippingAddress, 'paymentMethod'=> $paymentMethod]);
        //return view('Shipping::orderData');
    }

    public function addOrder(Request $request)
    {
        // dd(session()->get('checkout'));
        $getSession = session()->get('checkout');
        $payment = session()->get('payment');
        //dd($payment);

        $bill_id = (int)$getSession['billing_id'];
        $shipp_id = (int)$getSession['shipping_id'];
        $pay_id = (int)$payment['payment_id'];
        
        
        $total_price = $request->input('total_price');
       // $pro_id = $request->input('pro_id');
        $quantity = $request->input('total_qty');

        $order = new Order();
        $order->user_id = Auth::id();
        $order->billing_id = $bill_id;
        $order->shipping_id = $shipp_id;
        $order->payment_id = $pay_id;
        $order->total_price = $total_price;
        $order->quantity = $quantity;
        $order->save(); 
        $o_id = $order->id;

        
        $orderDetail = new Order_detail();
        // $orderDetail->order_id = $o_id;

        $product_id = $request->get('pro_id');
        //dd($request->get('pro_id'),$request->get('price'),$request->get('qty'));
        foreach($request->pro_id as $key => $value)
        {

            // $orderDetail->order_id = $o_id;
            // $orderDetail->product_id= $array[$key];
            // $orderDetail->total_price = $request->get('price')[$key];
            // $orderDetail->quantity = $request->get('qty')[$key];
            // $orderDetail->save();
            Order_detail::insert([
                'order_id' => $o_id,
                'user_id' => Auth::id(),
                'product_id'=> $value,
                'total_price' => $request->price[$key],
                'quantity' => $request->qty[$key],
            ]);

            Product::where('id',  $value)->decrement('stock', $request->qty[$key]);
            session()->flash('payment','checkout');
            cart::where('user_id',Auth::id())->delete();
        }

        return redirect()->route('orderViewStep');
        //return redirect()->route('products');
    }

    public function orderViewStep()
    {
        $orderView = Order_detail::where('user_id',Auth::id())->get();
        $orderAdd = Order::where('user_id',Auth::id())->get();
        return view("Shipping::OrderView",compact("orderView","orderAdd"));
    }
}
