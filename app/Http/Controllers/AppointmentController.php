<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\AppointmentNotification;
use App\Appointment;
use App\User;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $appointment = new Appointment;
        $appointment->space_id = $request->input('space_id');
        $appointment->owner_id = $request->input('owner_id');
        $appointment->user_id = auth()->user()->id;
        $appointment->space_name = $request->input('space_name');
        $appointment->firstname = auth()->user()->firstname;
        $appointment->lastname = auth()->user()->lastname;
        $appointment->phone = $request->input('phone');
        $appointment->message = $request->input('message');
        $appointment->schedule = $request->input('schedule');
        $appointment->time = $request->input('time');

        $appointment->save();
        $user = User::where('admin','!=',auth()->user()->admin)->get();
        \Notification::send($user,new AppointmentNotification(Appointment::latest('id')->first()));
        return redirect('/home/appointment');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $appointment = Appointment::find($id);
        $appointment->accept = '1';

        $appointment->save();
        $user = User::where('admin','!=',auth()->user()->admin)->get();
        \Notification::send($user,new AppointmentNotification(Appointment::latest('id')->first()));

        return redirect('/home/appointment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect('/home/appointment');
    }
}
