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

class FrontendController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Frontend::welcome");
    }

    public function Index()
    {
    	$products= Product::all();
    	$brands = Brand::select('brandname')->where(['status'=>'Y'])->get();
        $colors = Color::select('name')->where(['status'=>"Y"])->get();
        dd($brands);
    	return view("frontMaster",compact("products","brands","colors"));
    }

    public function listGridView(Request $request)
    {
    	// $products= Product::select('product_name')->where(['status'=>'Y'])->get();
    	// $brands = Brand::select('brandname')->where(['status'=>'Y'])->get();
     //    $colors = Color::select('name')->where(['status'=>"Y"])->get();
    	$products= Product::all();
    	$brands= Brand::all();
    	$colors= Color::all();
        dd($brands);
    	if($request->view == 'true')
    	{
    		return view("Frontend::FrontendList",compact("products","brands","colors"));
    	}
    	else
    	{
    		return view("Frontend::FrontendGrid",compact("products","brands","colors"));
    	}
    }

    public function details($product_url)
    {
        if(Product::where('url',$product_url)->exists())
        {
            $products = Product::where('url',$product_url)->get();
            $id = $products->pluck('id');//which returns single value - string by default
            $images = image::where('product_id',$id)->get();
            return view('Frontend::ProductDetails',compact("products","images"));
        }
        else
        {
            return redirect()->back()->with('status',"The Link Was Broken");
        }
    }

    public function increment($id)
    {
        $products = Product::find($id);
        return $products;
        // if($products)
        // return response()->json([
            
        //     'products'=> $products,
        // ]);

    }

   public function frontFilter(Request $request)
    {
        // dd($request->all());
        $colors = Color::where('status', 'Y')->get();
        $brands = Brand::where('status', 'Y')->get();

        //    $products = Product::whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->get();

        if (isset($request->category) && (isset($request->color))) {
            $products = Product::whereIn('brand_id', $request->category)->where('color_id', $request->color)
                ->where('status', 'Y')->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->orderBy($request->sort_by, $request->order_by)->paginate(5);
        } elseif (isset($request->category)) {
            $products = Product::whereIn('brand_id', $request->category)
                ->where('status', 'Y')->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->orderBy($request->sort_by, $request->order_by)->paginate(5);
        } elseif (isset($request->color) && $request->color != '') {
            $products = Product::orWhereIn('color_id', $request->color)->where('status', 'Y')->whereBetween('price', [(int)$request->minimum, (int)$request->maximum])->orderBy($request->sort_by, $request->order_by)->get();
        } else {
            $products = Product::orderBy($request->sort_by, $request->order_by)->get();
            // dd($products);
        }

        if (isset($products))
        {
            if ($request->view == 'true')
            {
                return view("Frontend::FrontendList",compact("products","brands","colors"));
            }
            else
            {
                return view("Frontend::FrontendGrid",compact("products","brands","colors"));
            }

        }
        else
        {
            return redirect()->back()->with('status',"The Filter Was Not Available");
        }
    }

}
