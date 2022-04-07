<?php

namespace App\Modules\Brand\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Brand\Models\Brand;
use DataTables;

class BrandController extends Controller
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
        return view("Brand::welcome");
    }

    public function brandForm()
    {
    	return view("Brand::AddBrand");
        
    }

    public function addData(Request $req)
    {
        $req->validate([
            'brandname'=>'required|unique:brands',
        ]);
    	$brands = new Brand();
    	$brands->brandname=$req->brandname;
        $user = $req->user(); // returns an instance of the authenticated user...
        $userid = $req->user()->id;
        $brands->user_id=$userid;
    	//$brands->status=$req->status;
    	$brands->save();

    	$brands=Brand::all();
        return redirect('/brandlist')->with('status','Brand Added successfully');
        //return view("Brand::BrandList",compact("brands"));
    }

    public function showBrand()
    {
        // $brands=Brand::get();
        // return view("Brand::BrandList",compact("brands"));
        $brands = Brand::join('users','users.id','=','brands.user_id')->where('status',array('Y'))->orwhere('status',array('N'))->get(['brands.*','users.user_name']);
        return view("Brand::BrandList",compact("brands"));	
    }

    public function changeStatus(Request $r)
    {
        $brands = Brand::find($r->id);
        $brands->status = $r->status;
        $brands->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return response()->json([
            'status'=>200,
            'brand'=> $brand,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'brandname'=>'required|unique:brands',
        ]);
        $brand_id = $request->input('brand_id');
        $brands = Brand::find($brand_id);
        $brands->brandname=$request->input('brandname');
        //$brands->status=$req->status;
        $brands->update();
        //return redirect('/brandlist')->with('Brand Updated successfully');
        return redirect()->back()->with('status','Brand Updated successfully');
    }

    public function archive(Request $request)
    {
        $brand_id = $request->input('archiveid');
        $brand = Brand::find($brand_id);
        $brand->status="T";
        $brand->save();
        $brand->delete();
        return redirect()->back()->with('status','Brand Deleted successfully');

    }

    public function trashView()
     {
        $brands = Brand::onlyTrashed()->get();
        return view("Brand::Trash",compact("brands"));
     }

    public function restore(Request $request)
    {
        $brand_id = $request->input('restoreid');
        $brand = Brand::withTrashed()->find($brand_id);
        $brand->status="Y";
        $brand->save();
        $brand->restore();
        return redirect()->back()->with('status','Brand Restored successfully');

    }

    public function destory(Request $request)
    {
        $brand_id = $request->input('destoryid');
        $brand = Brand::withTrashed()->find($brand_id);
        $brand->forceDelete();
        return redirect()->back()->with('status','Brand Permenet Deleted successfully');

    }

    public function show()
    {
        $brands=Brand::get();
        return view("example",compact("brands"));
    }

       

    //  public function changeStatus(Request $request)
    // {
    //     $brands = Brand::find($request->id);
    //     $brands->status = $request->status;
    //     $brands->save();
  
    //     return response()->json(['success'=>'Status change successfully.']);
    // }
 
}




