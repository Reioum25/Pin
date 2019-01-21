<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rent;

class RentController extends Controller
{
    //
    public function store(Request $request)
    {
        $rent = new Rent;
        $rent->space_id = $request->input('space_id');
        $rent->user_id = $request->input('user_id');
        $rent->space_name = $request->input('space_name');
        $rent->firstname = $request->input('firstname');
        $rent->lastname = $request->input('lastname');
        $rent->rent_duration = $request->input('rent_duration');
        $rent->status = 'Unavalable';

        $rent->save();

        return back();;
    }
}
