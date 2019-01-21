<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class AppointmentController3 extends Controller
{
    //
    public function update(Request $request, $id)
    {
        //
        $appointment = Appointment::find($id);
        $appointment->accept = '3';

        $appointment->save();

        return back();
    }
}
