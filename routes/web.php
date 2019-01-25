<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Http\Request;
use App\CommercialSpace;
use App\User;
use App\Comment;
use App\Appointment;
use App\Rent;

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::get('/list', 'PagesController@commercialspacelist');
Route::get('/list/search', 'PagesController@commercialspacesearch');
Route::get('/list/{commercialspace}/show', 'PagesController@commercialspace');
Route::resource('post', 'PostsController');

Auth::routes();
Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');


Route::group(['middleware' => ['web','auth']], function()
{
    Route::resource('/home/createspace', 'CommercialSpaceController');
    Route::resource('/home/registerowner', 'AccountController');
    Route::resource('/home/show', 'CommentController');
    Route::resource('/home/account', 'OwnerAccountController');
    Route::resource('/home/appointment', 'AppointmentController');
    Route::resource('/home/book', 'AppointmentController2');
    Route::resource('/home/cancel', 'AppointmentController3');
    Route::resource('/home/success', 'AppointmentConroller4');
    Route::resource('/home/rent', 'RentController');

    Route::get('/home', function()
    {
        if(Auth::user()->admin == 0)
        {
            $commercialspace = CommercialSpace::orderBy('id', 'desc')->take(6)->get();
            return view('user.userhome')->with('commercialspace', $commercialspace);

        }elseif(Auth::user()->admin == 1)
        {
            $users['users'] = \App\User::all();
            $commercialspace = CommercialSpace::orderBy('id', 'desc')->take(6)->get();
            return view('admin.adminhome')->with('commercialspace', $commercialspace);

        }elseif(Auth::user()->admin == 2)
        {
            $owner_id = auth()->user()->id;
            
            $commercialspace = CommercialSpace::orderBy('id', 'desc')->take(6)->get();
            
            return view('owner.ownerhome', compact('owner_id'))->with('commercialspace', $commercialspace);
        }
    });


    Route::get('/home/createspace', function()
    {
        if(Auth::user()->admin == 0)
        {
            
        }elseif(Auth::user()->admin == 1)
        {
            return view('admin.createspace');

        }elseif(Auth::user()->admin == 2)
        {
            return view('owner.ownercreatespace');
        }
    });
    

    Route::get('/home/list', function()
    {
        if(Auth::user()->admin == 0)
        {
            $commercialspace = CommercialSpace::orderBy('id', 'desc')->paginate(9);
            return view('user.commercialspacelist3')->with('commercialspace', $commercialspace);
            
        }elseif(Auth::user()->admin == 1)
        {
            $commercialspace = CommercialSpace::orderBy('id', 'desc')->paginate(9);
            return view('admin.commercialspacelist')->with('commercialspace', $commercialspace);

        }elseif(Auth::user()->admin == 2)
        {
            $owner_id = auth()->user()->id;
            $commercialspace = CommercialSpace::orderBy('id', 'desc')->paginate(9);
            return view('owner.commercialspacelist2', compact('owner_id'))->with('commercialspace', $commercialspace);
        }
        
    });

    Route::get('/home/ownerlist', function()
    {
        if(Auth::user()->admin == 0)
        {
            
        }elseif(Auth::user()->admin == 1)
        {

        }elseif(Auth::user()->admin == 2)
        {
            $owner_id = auth()->user()->id;
            $commercialspace = CommercialSpace::orderBy('id', 'desc')->get();
            return view('owner.ownerspacelist', compact('owner_id'))->with('commercialspace', $commercialspace);
        }
        
    });

    Route::get('/home/{commercialspace}/edit', function($id)
    {
        if(Auth::user()->admin == 0)
        {
            
        }elseif(Auth::user()->admin == 1)
        {
            $commercialspace = CommercialSpace::findOrFail($id);
            return view('admin.editspace')->with('commercialspace', $commercialspace);

        }elseif(Auth::user()->admin == 2)
        {
            $commercialspace = CommercialSpace::findOrFail($id);
            return view('owner.ownereditspace')->with('commercialspace', $commercialspace);
        }
        
    });

    Route::get('/home/{user}/editaccount', function($id)
    {
        if(Auth::user()->admin == 0)
        {
            
        }elseif(Auth::user()->admin == 1)
        {
            $user = User::findOrFail($id);
            return view('admin.editaccount')->with('user', $user);

        }elseif(Auth::user()->admin == 2)
        {

        }
    });


    Route::get('/home/account', function()
    {
        if(Auth::user()->admin == 0)
        {
            $user = User::find(auth()->user()->id);
            return view('user.useraccount')->with('user', $user);

        }elseif(Auth::user()->admin == 1)
        {

        }elseif(Auth::user()->admin == 2)
        {
            $user = User::find(auth()->user()->id);
            return view('owner.owneraccount')->with('user', $user);

        }
    });

    Route::get('/home/{commercialspace}/show', function($id)
    {
        if(Auth::user()->admin == 0)
        {
            $user_id = auth()->user()->id;
            $comment = Comment::orderBy('id', 'asc')->get();
            $appointment = Appointment::orderBy('id', 'asc')->get();
            $rent = Rent::orderBy('id', 'asc')->get();
            $commercialspace = CommercialSpace::findOrFail($id);
            return view('user.commercialspace3', compact('comment', 'user_id', 'appointment', 'rent'))->with('commercialspace', $commercialspace);
            
        }elseif(Auth::user()->admin == 1)
        {

            $comment = Comment::orderBy('id', 'asc')->get();
            $commercialspace = CommercialSpace::findOrFail($id);
            return view('admin.commercialspace', compact('comment'))->with('commercialspace', $commercialspace);

        }elseif(Auth::user()->admin == 2)
        {
            $user_id = auth()->user()->id;
            $comment = Comment::orderBy('id', 'asc')->get();
            $commercialspace = CommercialSpace::findOrFail($id);
            return view('owner.commercialspace2', compact('comment', 'user_id'))->with('commercialspace', $commercialspace);
        }
    });

    Route::get('/home/accountlist', function()
    {
        if(Auth::user()->admin == 0)
        {
            
        }elseif(Auth::user()->admin == 1)
        {
            $user = User::orderBy('id', 'asc')->get();
            return view('admin.accountlist')->with('user', $user);
        }
        elseif(Auth::user()->admin == 2)
        {
            
        }
    });

    Route::get('/home/registerowner', function()
    {
        if(Auth::user()->admin == 0)
        {
            
        }elseif(Auth::user()->admin == 1)
        {
            return view('admin.registerowner');

        }elseif(Auth::user()->admin == 2)
        {
            
        }
        
    });

    Route::get('/home/search', function()
    {
        if(Auth::user()->admin == 0)
        {
            $commercialspace = CommercialSpace::orderBy('id', 'desc')->paginate(9);
            return view('user.commercialspacesearch')->with('commercialspace', $commercialspace);
            
        }elseif(Auth::user()->admin == 1)
        {
            $commercialspace = CommercialSpace::orderBy('id', 'desc')->paginate(9);
            return view('admin.commercialspacesearch')->with('commercialspace', $commercialspace);

        }elseif(Auth::user()->admin == 2)
        {
            $owner_id = auth()->user()->id;
            $commercialspace = CommercialSpace::orderBy('id', 'desc')->paginate(9);
            return view('owner.commercialspacesearch2', compact('owner_id'))->with('commercialspace', $commercialspace);
        }
    });



    Route::get('/home/appointment', function()
    {
        if(Auth::user()->admin == 0)
        {
            $appointment = Appointment::orderBy('id', 'asc')->get();
            return view('user.userappointment')->with('appointment', $appointment);

            
        }elseif(Auth::user()->admin == 1)
        {
            
        }elseif(Auth::user()->admin == 2)
        {
            $appointment = Appointment::orderBy('id', 'asc')->get();
            return view('owner.ownerappointment')->with('appointment', $appointment);
            
        }
    });

    

    
});
