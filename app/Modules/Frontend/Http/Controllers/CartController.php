<?php

namespace App\Modules\Frontend\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Product\Models\Product;
use App\Modules\Brand\Models\Brand;
use App\Modules\Color\Models\Color;
use App\Models\image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Modules\Frontend\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */

    public function addToCartData(Request $request)
    {
        $pro_id = $request->input("product_id");
        $qty = $request->input("quantity");

        if(Auth::check())
        {
            $product = Product::all();
            $product_check = Product::where('id',$pro_id)->first();
            $stock_check = Product::where('stock',$qty)->first();
            $stock = Product::where('id', $pro_id)->pluck('stock');//Product::select('stock')->where('id',$pro_id)->get();

            if($product_check)
            {
                if($stock_check <= $stock)
                {
                    if(Cart::where('product_id',$pro_id)->where('user_id',Auth::id())->exists())
                    {
                        return response()->json(['status'=> $product_check->product_name." Already Added to Cart"]);
                    }
                    else
                    {
                        $cartProducts = new Cart();
                        $cartProducts->user_id = Auth::id();
                        $cartProducts->product_id = $pro_id;
                        $cartProducts->quantity = $qty;
                        $cartProducts->save();
                        return response()->json(['status'=> $product_check->product_name. " Added to Cart"]);
                    }
                }
                else
                {
                    return response()->json(['status'=> $product_check->product_name." Select stock proper "]);
                }
            }
            else
            {
                return response()->json(['status'=>" Select proper stock"]);
            }
        }
        else
        {
            // $products = Product::where('id',$pro_id)->first();
            // $cart = session()->get('cart',[]);
            // $cart[$pro_id]=[
            //     'pro_id' => $pro_id,
            //     'qty' =>  $qty,
            //     'name' => $products->product_name,
            //     'image' => $products->coverImg,
            //     'price' => $products->price,
            //     'url' => $products->url,
            // ];
            // session()->put('cart',$cart);
            // return response()->json(['message' => "session Done.",'status'=>200]);
            return response()->json(['status'=>" login to Continue"]);
        }
        
    }

    public function Index(Request $request)
    {
    	$cartProducts = Cart::where('user_id',Auth::id())->get();
     //    $user = $request->user(); // returns an instance of the authenticated user...
     //    $userid = $request->user()->id;
    	// $cartProducts = Cart::join('products','carts.product_id','=','products.id')->where('carts.user_id',$userid)->select('products.*')->get();
        //dd($cartProducts);
    	return view("Frontend::cart",compact('cartProducts'));
    }

    public function removeCartData(Request $request)
    {
        if(Auth::check())
        {
            $pro_id = $request->input("product_id");

            if(Cart::where('product_id',$pro_id)->where('user_id',Auth::id())->exists())
            {
                $cartProducts = Cart::where('product_id',$pro_id)->where('user_id',Auth::id())->first();
                $cartProducts->delete();
                return response()->json(['status'=>" Product Deleted Successfully."]);
            }
        }
        else
        {
            return response()->json(['status'=>" login to Continue"]);
        }
    }

    public function increment($id)
    {
        $products = Product::find($id);
        return $products;
    }

    public function updateQtyCart(Request $request)
    {
        $id = $request->input('pro_id');
        $qty = $request->input('pro_qty');

        if(Auth::check())
        {
            if(Cart::where('product_id',$id)->where('user_id',Auth::id())->exists())
            {
                $carts = Cart::where('product_id',$id)->where('user_id',Auth::id())->first();
                $carts->quantity = $qty;
                $carts->update();
                return response()->json(['status'=>" Quantity Updated."]);
            }
        }
        else
        {
            return response()->json(['status'=>" login to Continue"]);
        }          
    }

    public function miniCart(Request $request)
    {
        $cartProducts = Cart::where('user_id',Auth::id())->get();
        return view("Frontend::minicart",compact('cartProducts'));       
    }
}
