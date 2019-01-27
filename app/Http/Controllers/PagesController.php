<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Input;
use App\CommercialSpace;
use App\Barangay;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index() {
        $barangays = Barangay::all();
        $commercialspace = CommercialSpace::orderBy('id', 'desc')->get();
        return view('pages.index')->with('commercialspace', $commercialspace)->with('barangays', $barangays);
    }

    public function commercialspacelist() {

        $commercialspace = CommercialSpace::orderBy('id', 'desc')->paginate(9);
        return view('pages.commercialspacelist4')->with('commercialspace', $commercialspace);
    }

    public function commercialspacesearch(Request $request) {
        $commercialspaces = DB::table('commercial_spaces');
        
        if($request->has('cat'))
        {
            if(!is_null($request->cat))
                $commercialspaces = $commercialspaces->where('p_category', $request->cat);

        }

        //Location or barangay
        if($request->has('s'))
        {
            if($request->s != "Any")
            {
                $barangay = Barangay::find($request->s)->name;
                $commercialspaces = $commercialspaces->where('barangay', $barangay);
            }
        }

        //Type
        if($request->has('type') && !is_null($request->type))
        {
            $commercialspaces = $commercialspaces->where('p_type', $request->type);
        }

        if($request->has('min_price') && $request->has('max_price'))
        {
            $min = $request->min_price;
            $max = $request->max_price;
            $commercialspaces = $commercialspaces->where(function($query) use($min, $max){
                $query->where('price', '>=', $min)->where('price', '<=', $max);
            });
        }else if($request->has('min_price'))
        {
            $commercialspaces = $commercialspaces->where('price', '>=', $request->min_price);          
        }else if($request->has('max_price'))
        {
            $commercialspaces = $commercialspaces->where('price', '<=', $request->max_price);
        }

        $commercialspaces = $commercialspaces->paginate(9);

        $s = $request->s;
        
        $request->flash();

        // return view('pages.commercial_space_search')->with('commercialspaces', $commercialspaces)->with('s',$s)->with('request', $request);
        return view('pages.commercial_space_search_new')->with('commercialspaces', $commercialspaces)->with('s',$s)->with('request', $request)->with('barangays', Barangay::all());
    }

    public function commercialspace($id) {
        $commercialspace = CommercialSpace::findOrFail($id);
        return view('pages.commercial_space')->with('commercialspace', $commercialspace);
    }
    public function about() {

        return view('pages.about');
    }
    public function contact() {

        return view('pages.contact');
    }
} 
