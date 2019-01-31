<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barangay;

class SubscriptionController extends Controller
{
    public function listProperty()
    {
        $barangays = Barangay::all();
        return view('user.list_property')->with(['barangays' => $barangays]);
    }
}
