<?php

namespace App\Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Product\Models\Product;
use App\Modules\Brand\Models\Brand;
use App\Modules\Color\Models\Color;
use App\Models\image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function welcome()
    {
        return view("Product::welcome");
    }

    public function showProduct()
    {
        // $products=Product::get();
        // return view("Product::ProductList",compact("products"));
        //$data=Product::paginate(3);
        $products = Product::join('users','users.id','=','products.user_id')->join('colors','colors.id','=','products.color_id')->join('brands','brands.id','=','products.brand_id')->where('products.status',array('Y'))->orwhere('products.status',array('N'))->get(['products.*','users.user_name','colors.name','brands.brandname']);
        //dd($products);
        return view("Product::ProductList",["products"=>$products]);	
    }

    public function productForm()
    {
        $cateogrys = Brand::all();//select('brandname')->where(['status'=>'Y'])->get();
        $colors = Color::all();//select('name')->where(['status'=>"Y"])->get();
        return view('Product::AddProduct',["cateogrys"=>$cateogrys,"colors"=>$colors]);
    }

    public function store(Request $request)
    {
        $request->validate(['product_name'=>'required||unique:products',
            'url'=>'required|unique:products',
            'upc'=>'required|integer|unique:products',
            'stock' => 'required|integer',
            'price'=>'required|integer|max:99999',
            'coverImg' => 'required',
            'brand_id' => 'required',
            'color_id' => 'required',
            'multiple' => 'required',
            'description'=>'required'
        ]);
       
        if($request->hasfile('coverImg'))
        {
            $product = new Product;
            $product->product_name = $request->input('product_name');
            $product->url = $request->input('url');
            $product->upc = $request->input('upc');
            $product->stock = $request->input('stock');
            $product->price = $request->input('price');
            $product->brand_id = $request->input('brand_id');
            $product->color_id = $request->input('color_id');
            $user = $request->user(); // returns an instance of the authenticated user...
            $userid = $request->user()->id;
            $product->user_id=$userid;
            $product->description = $request->input('description');

            $file = $request->file('coverImg');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/cover/',$filename);
            $product->coverImg =$filename;
            $product->save();
        }

            if($request->hasfile('multiple'))
            {
                $files = $request->file('multiple');
                foreach($files as $file)
                {
                    $imagename = time().'.'.$file->getClientOriginalName();
                    $request['product_id']=$product->id;
                    $request['image']=$imagename;
                    $file->move('uploads/cover/',$imagename);
                    image::create($request->all());
                }
            }        
        return redirect()->back()->with('status',"Product added successfully..!");
    }

    public function changeStatus(Request $r)
    {
        $products = Product::find($r->id);
        $products->status = $r->status;
        $products->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return response()->json([
            'status'=>200,
            'product'=> $product,
        ]);
    }

    public function update(Request $request)
    {
        $product_id = $request->input('product_id');
        $products = Product::find($product_id);
        $products->brandname=$request->input('brandname');
        //$products->status=$request->status;
        $products->update();
        //return redirect('/productlist')->with('Product Updated successfully');
        return redirect()->back()->with('status','Product Updated successfully');
    }

    public function editnew($id)
    {
        $product = Product::find($id);
        $cateogrys = Brand::all();
        $colors = Color::all();
        return view('Product::ProductEdit',["product"=>$product,"cateogrys"=>$cateogrys,"colors"=>$colors]);
    }

    public function deleteImage($id)
    {
        $images = image::find($id);
        if(File::exists('uploads/images/'.$images->image))
        {
            File::delete('uploads/images/'.$images->image);
        }
        image::find($id)->delete();
        return back();
    }

    public function deleteCover($id)
    {
        $cover = Product::find($id)->cover;
        if(File::exists('uploads/cover/'.$cover));
        {
            File::delete('uploads/cover/'.$cover);
        }
        
        return back();
    }

    public function updatenew(Request $request,$id)
    {
        $product = Product::find($id);
        if($request->hasfile('coverImg'))
        {
            if(File::exists('uploads/cover/'.$product->coverImg))
            {
                File::delete('uploads/cover/'.$product->coverImg);
            }
            
            $product->product_name = $request->input('product_name');
            $product->url = $request->input('url');
            $product->upc = $request->input('upc');
            $product->stock = $request->input('stock');
            $product->price = $request->input('price');
            $product->brand_id = $request->input('brand_id');
            $product->color_id = $request->input('color_id');
            $user = $request->user(); // returns an instance of the authenticated user...
            $userid = $request->user()->id;
            $product->user_id=$userid;
            $product->description = $request->input('description');

            $file = $request->file('coverImg');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/cover/',$filename);
            $product->coverImg =$filename;
            $product->update();
        }

            if($request->hasfile('multiple'))
            {
                $files = $request->file('multiple');
                foreach($files as $file)
                {
                    $imagename = time().'.'.$file->getClientOriginalName();
                    $request['product_id']=$product->id;
                    $request['image']=$imagename;
                    $file->move('uploads/cover/',$imagename);
                    image::create($request->all());
                }
            }
        return redirect('/productlist')->with('status',"Product Updated successfully..!");
    }

    public function archive(Request $request)
    {
        $product_id = $request->input('archiveid');
        $product = Product::find($product_id);
        $product->status="T";
        $product->save();
        $product->delete();
        return redirect()->back()->with('status','Product Deleted successfully');
    }

    public function trashView()
    {
        $products = Product::onlyTrashed()->join('users','users.id','=','products.user_id')->join('colors','colors.id','=','products.color_id')->join('brands','brands.id','=','products.brand_id')->where('products.status',array('T'))->get(['products.*','users.user_name','colors.name','brands.brandname']);
        return view("Product::Trash",compact("products"));
    }

    public function restore(Request $request)
    {
        $product_id = $request->input('restoreid');
        $product = Product::withTrashed()->find($product_id);
        $product->status="Y";
        $product->save();
        $product->restore();
        return redirect()->back()->with('status','Product Restored successfully');
    }

    public function destory(Request $request)
    {
        $product_id = $request->input('destoryid');
        $product = Product::withTrashed()->find($product_id);

        $destination= 'uploads/cover/'.$product->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $images = image::where("product_id",$product->id)->get();
        foreach($images as $image)
        {
            if(File::exists('uploads/cover/'.$image->image))
            {
                File::delete('uploads/cover/'.$image->image);
            }   
        }
        $product->forceDelete();
        return redirect()->back()->with('status','Product Permenet Deleted successfully');
    }
}

        // $request->validate([
        //     'fname'=>'required|alpha',
        //     'lname'=>'required|alpha',
        //     'email'=>'required|email',
        //     'city' =>'required',
        //     'state' =>'required',
        //     'zipcode' =>'required|integer',
        //     'country' =>'required',
        //     'phone_no' =>'required|integer',
        // ]);

