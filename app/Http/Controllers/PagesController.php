<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Input;
use App\CommercialSpace;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index() {

        $commercialspace = CommercialSpace::orderBy('id', 'desc')->get();
        return view('pages.index')->with('commercialspace', $commercialspace);
    }

    public function commercialspacelist() {

        $commercialspace = CommercialSpace::orderBy('id', 'desc')->paginate(9);
        return view('pages.commercialspacelist4')->with('commercialspace', $commercialspace);
    }

    public function commercialspacesearch(Request $request) {

        // $commercialspace = CommercialSpace::orderBy('id', 'desc')->paginate(9);
        // return view('pages.commercialspacesearch4')->with('commercialspace', $commercialspace);
        if($request->has('cat')){
            $p_category = $request->input('cat');
        }else{
            $p_category = "-";
        }
        if($request->has('type')){
            $p_type = $request->input('type');
        }else{
            $p_type = "-";
        }
        if($request->has('min_price')){
            $min_price = $request->input('min_price');
        }else{
            $min_price = "-";
        }
        if($request->has('cat')){
            $max_price = $request->input('max_price');
        }else{
            $max_price = "-";
        }

        // dd($p_category);
        $commercialspace = DB::table('commercial_spaces')
                            ->where('p_category',$p_category)
                            ->orWhere('p_type',$p_type)
                            ->orWhere('price','>',$min_price)
                            ->orWhere('price','<',$max_price)
                            ->paginate(9);

        return view('pages.commercialspacesearch4')->with('commercialspace', $commercialspace);
    }

    public function commercialspace($id) {
        $query = CommercialSpace::where('column_name',);
        $commercialspace = CommercialSpace::findOrFail($id);
        return view('pages.commercialspace4')->with('commercialspace', $commercialspace);
    }
    public function about() {

        return view('pages.about');
    }
    public function contact() {

        return view('pages.contact');
    }
} 
