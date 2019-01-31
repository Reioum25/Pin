<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barangay;
use App\CommercialSpace;
use App\Subscription;
use Auth;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function listProperty()
    {
        $barangays = Barangay::all();
        return view('user.list_property')->with(['barangays' => $barangays]);
    }

    public function listPropertyDisabled(Request $request)
    {
        // return $request;
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'image1' => 'nullable|image|max:9999',
            'image2' => 'nullable|image|max:9999',
            'image3' => 'nullable|image|max:9999',
            'qty' => 'required|integer|min:1',
        ]);

        // Handle file upload
        if($request->hasFile('image1')){
            // Get filename with the extension
            $filenameWithExt1 = $request->file('image1')->getClientOriginalName();
            // Get just filename
            $filename1 = pathinfo($filenameWithExt1, PATHINFO_FILENAME);
            // Get just ext
            $extension1 = $request->file('image1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore1 = $filename1.'_'.time().'.'.$extension1;
            // Upload image
            $path1 = $request->file('image1')->storeAs('public/images', $fileNameToStore1);


        } else {
            $fileNameToStore1 = 'noimage.jpg';
        }

        if($request->hasFile('image2')){
            // Get filename with the extension
            $filenameWithExt2 = $request->file('image2')->getClientOriginalName();
            // Get just filename
            $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
            // Get just ext
            $extension2 = $request->file('image2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2 = $filename2.'_'.time().'.'.$extension2;
            // Upload image
            $path2 = $request->file('image2')->storeAs('public/images', $fileNameToStore2);
        } else {
            $fileNameToStore2 = 'noimage.jpg';
        }

        if($request->hasFile('image3')){
            // Get filename with the extension
            $filenameWithExt3 = $request->file('image3')->getClientOriginalName();
            // Get just filename
            $filename3 = pathinfo($filenameWithExt3, PATHINFO_FILENAME);
            // Get just ext
            $extension3 = $request->file('image3')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore3 = $filename3.'_'.time().'.'.$extension3;
            // Upload image
            $path3 = $request->file('image3')->storeAs('public/images', $fileNameToStore3);


        } else {
            $fileNameToStore3 = 'noimage.jpg';
        }

        $qty = $request->input('qty');

        for ($i = 0; $i < $qty; $i++)
        {
            $commercialspace = new CommercialSpace;
            $commercialspace->owner_id = auth()->user()->id;

            $commercialspace->p_category = $request->input('Property_category');

            switch($request->Property_category)
            {
                case "For Sale":
                    $commercialspace->p_type = $request->input('property_type-sale');
                    break;
                case "For Rent":
                    $commercialspace->p_type = $request->input('property_type-rent');
                    break;
                case "For Lease":
                    $commercialspace->p_type = $request->input('property_type-lease');
                    break;
            }

            $commercialspace->space_name = $request->input('namespace');
            $commercialspace->about_space = $request->input('aboutspace');
            $commercialspace->sqm = $request->input('sqm');
            $commercialspace->cr = $request->input('cr');

            $commercialspace->barangay = Barangay::find($request->s)->id;

            $commercialspace->street = $request->input('street');
            $commercialspace->latitude = $request->input('lat');
            $commercialspace->longitude = $request->input('lng');
            $commercialspace->about_area = $request->input('aboutarea');
            $commercialspace->owner_name = $request->input('name');
            $commercialspace->email = $request->input('email');
            $commercialspace->mobile_no = $request->input('mobile');
            $commercialspace->tel_no = $request->input('tel');
            $commercialspace->price = $request->input('price');
            $commercialspace->type = $request->input('type');
            $commercialspace->status = $request->input('status');
            $commercialspace->image1 = $fileNameToStore1;
            $commercialspace->image2 = $fileNameToStore2;
            $commercialspace->image3 = $fileNameToStore3;

            $subscription = Subscription::where('user_id', Auth::user()->id)->where('isConfirmed', true)->orderBy('id', 'desc')->first();
            
            //Not subscribed
            if(is_null($subscription))
            {
                $commercialspace->subscription = false;
                $commercialspace->save();
                return redirect()->route('user.subscribe.current');
            }
            //Subscribed
            else
            {
                $commercialspace->subscription = true;
                $commercialspace->save();
                return redirect('/home');
            }
        }
    }

    public function getSubscription()
    {
        $subscriptions = Subscription::where('user_id', Auth::user()->id)->orderBy('subscribed')->get();
        return view('user.subscriptions')->with(['subscriptions' => $subscriptions]);
    }

    public function addSubscription(Request $request)
    {
        $existing = Subscription::where('user_id', Auth::user()->id)->get();
        
        $sub = new Subscription;
        $sub->user_id = Auth::user()->id;
        $sub->date_length = $request->subscription;
        $sub->isConfirmed = false;

        if(!is_null($existing))
        {
            $latest_date = Carbon::parse('1970-01-01 00:00:00'); 
            foreach($existing as $ex)
            {
                $date = Carbon::parse($ex->remaining);
                if($latest_date->lessThan($date))
                {
                    $latest_date = $date;
                }
            }

            if(Carbon::now()->greaterThan($latest_date))
                $latest_date = Carbon::now();

            $latest_date = $latest_date->toDateTimeString();
        }
        else
            $latest_date = Carbon::now()->toDateTimeString();

        $sub->subscribed = $latest_date;    
        $sub->save();
        
        return redirect()->route('user.subscribe.current');
    }

    public function getSubscribers()
    {
        $subscribers = Subscription::with('user')->get();
        // return $subscribers;
        return view('admin.subscribers_list')->with(['subscribers' => $subscribers]);
    }

    public function confirmSubscription(Request $request)
    {
        Subscription::find($request->subscribe)->update(['isConfirmed' => true ]);
        return redirect()->route('admin.subscribe.list');
    }

}
