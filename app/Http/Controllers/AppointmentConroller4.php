<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\CommercialSpace;
use App\Rent;

class AppointmentConroller4 extends Controller
{
    //
    public function update(Request $request, $id)
    {
        //
        $rent = new Rent;
        $rent->space_id = $request->input('space_id');
        $rent->user_id = $request->input('user_id');
        $rent->space_name = $request->input('space_name');
        $rent->firstname = $request->input('firstname');
        $rent->lastname = $request->input('lastname');
        $rent->rent_duration = $request->input('rent_duration');
        $rent->status = 'Unavailable';

        $rent->save();

        $appointment = Appointment::find($id);
        $appointment->accept = '4';
        $appointment->save();

        $commercialspace = CommercialSpace::find($id); 
        $commercialspace->status = 'Unavailable';

        $commercialspace->save();

        return back();
    }
}
