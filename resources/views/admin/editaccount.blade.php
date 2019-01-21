@extends('admin.admin-layouts.app')

@section('content')

<div class="container" style="padding-top: 100px; padding-bottom: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="font-family: Century Gothic; font-size: 20px">Update Account</div>
    
                    <div class="card-body">
                        {!! Form::open(['action' => ['AccountController@update', $user->id], 'method' => 'POST']) !!}

                            <div class="form-group row">
                                {{Form::label('firstname', 'First name', ['class' => 'col-md-4 col-form-label text-md-right'])}}
    
                                <div class="col-md-6">
                                    {{Form::text('firstname', $user->firstname, ['class' => 'form-control', 'required'])}} 
                                </div>
                            </div>
    
                            <div class="form-group row">
                                    {{Form::label('lastname', 'Last name', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                    <div class="col-md-6">
                                        {{Form::text('lastname', $user->lastname, ['class' => 'form-control', 'required'])}} 
                                    </div>
                                </div>
    
                            <div class="form-group row">
                                {{Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 col-form-label text-md-right'])}}
                                <div class="col-md-6">
                                    {{Form::email('email', $user->email, ['class' => 'form-control', 'required'])}}
                                </div>
                            </div>

                            <div class="form-group row">
                                    {{Form::label('phone', 'Phone No.', ['class' => 'col-md-4 col-form-label text-md-right'])}}
        
                                    <div class="col-md-6">
                                        {{Form::text('phone', $user->phone, ['class' => 'form-control', 'required'])}} 
                                    </div>
                                </div>
    
                            {{Form::hidden('_method','PUT')}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    {{Form::submit('Save Changes', ['class' => 'btn btn-primary'])}}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection