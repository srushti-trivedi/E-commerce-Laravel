<?php

namespace App\Modules\Color\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Color\Models\Color;
use Auth;
use DataTables;
use Illuminate\Pagination\CursorPaginator;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $color = new Color;
        return view("Color::welcome");
    }

    public function colorForm()
    {
        $color = new Color;
        return view("Color::color_form");
    }

    public function addColor(Request $req)
    {
        $req->validate([
            'name'=>'required|unique:colors',
        ]);
    	$color = new Color;
    	$user = $req->user(); // returns an instance of the authenticated user...
        $userid = $req->user()->id;
        $color->user_id=$userid;
    	$color->name = $req->name;;
       	$color->save();    	
        $colors = Color::all();
        return redirect('colorlist')->with('status','Color Added successfully');
    }

    public function showColor()
    {
        // $colors = Color::all();
        // return view("Color::ColorList",compact("colors"));
        $colors = Color::join('users','users.id','=','colors.user_id')->where('status',array('Y'))->orwhere('status',array('N'))->get(['colors.*','users.user_name']);
        return view("Color::ColorList",compact("colors"));
    }

    public function changeStatus(Request $r)
    {
        $colors = Color::find($r->id);
        $colors->status = $r->status;
        $colors->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

    public function edit($id)
    {
        $color = Color::find($id);
        return response()->json([
            'status'=>200,
            'color'=> $color,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:colors',
        ]);
        $color_id = $request->input('color_id');
        $colors = Color::find($color_id);
        $colors->name=$request->input('name');
        //$brands->status=$req->status;
        $colors->update();
        //return redirect('/colorlist')->with('Brand Updated successfully');
        return redirect()->back()->with('status','Color Updated successfully');
    }

    public function archive(Request $request)
    {
        $color_id = $request->input('archiveid');
        $colors = Color::find($color_id);
        $colors->status="T";
        $colors->save();
        $colors->delete();
        return redirect()->back()->with('status','Color Deleted successfully');

    }

    public function trashView()
     {
        $colors = Color::onlyTrashed()->get();
        return view("Color::Trash",compact("colors"));
     }

    public function restore(Request $request)
    {
        $color_id = $request->input('restoreid');
        $colors = Color::withTrashed()->find($color_id);
        $colors->status="Y";
        $colors->save();
        $colors->restore();
        return redirect()->back()->with('status','Color Restored successfully');

    }

    public function destory(Request $request)
    {
        $color_id = $request->input('destoryid');
        $colors = Color::withTrashed()->find($color_id);
        $colors->forceDelete();
        return redirect()->back()->with('status','Color Permenet Deleted successfully');

    }
}