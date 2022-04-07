<?php

namespace App\Modules\Color\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Color\Models\Color;
use Auth;
use DataTables;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $color = new Color;
        return view("Color::color_form");
    }

    public function addData(Request $req)
    {
    	$color = new Color;
    	$user = $req->user(); // returns an instance of the authenticated user...
        $userid = $req->user()->id;
        $color->user_id=$userid;
    	$color->name = $req->name;;
    	$color->status = $req->status;
    	$color->save();
    	//return view("Color::list");
        $colors = Color::all();
        return view("Color::color_list",compact("colors"));
    }

    public function view()
    {
        $colors = Color::all();
        return view("Color::color_list",compact("colors"));//,compact('color'));
    }

    public function data(Request $reqest)
    {
        $color = new Color;
        $color->status = $req->status;
        $color->id = $req->$catId;
        if($status=='Y')
        {
            $status='N';
        }
        else{
            $status='Y';
        }
        $color->save();
        $colors = Color::all();
        return view("Color::color_list",compact("colors"));//,compact('color'));
    }

    public function show(Request $reqest)
    {

        $color = Color::get();
        if($reqest->ajax()){
            $alldata = DataTables::of($color)
             ->addIndexColumn()
             ->addColumn('status',function($row){
                // $switch='<a href="<input type="checkbox" data-toggle="switchbutton" checked data-onstyle="success">'.$row->status.'</a>';
                $switch=$row->status;
                return $switch;
                })
             ->addColumn('action',function($row){
                $btn ='<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editStudent">Edit</a>';
                $btn1 ='<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" data-original-title="Delete" class="edit btn btn-danger btn-sm deleteStudent">Delete</a>';
                return $btn.$btn1;
             })
             ->rawColumns(['action'])->make(true);
             return $alldata;
        }
    	return view("Color::list",compact('color'));
    }
}

// From 03_ujjwaldangi_Nursery_ A to Everyone 12:37 PM
// $brands = Brand::join('users','users.id','=','brands.userid')->where('status',array('Y'))->orwhere('status',array('N'))->get(['brands.*','users.username']);
//          return view("Brand::brandlist",compact("brands"));
// From Dhruv Patel to Everyone 12:41 PM
// <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
// <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css">
// <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
//     <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
