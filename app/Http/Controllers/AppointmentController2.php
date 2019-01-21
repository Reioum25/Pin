<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

class AppointmentController2 extends Controller
{
    //
    public function update(Request $request, $id)
    {
        //
        $appointment = Appointment::find($id);
        $appointment->accept = '2';

        $appointment->save();

        return redirect('/home/appointment');
    }
}
