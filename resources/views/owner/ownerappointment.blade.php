@extends('owner.owner-layouts.app')

@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-family: Century Gothic; font-size: 20px">Pending Request</div>
        
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Space Name</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Message</th>
                            <th scope="col">Schedule</th>
                            <th scope="col">Time</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($appointment) > 0)
                            @foreach($appointment as $appointments)
                                @if($appointments->owner_id == auth()->user()->id)
                                    @if($appointments->accept == 0)
                                        <tr>
                                            <td>{{$appointments->space_name}}</td>
                                            <td>{{$appointments->firstname}}</td>
                                            <td>{{$appointments->lastname}}</td>
                                            <td>{{$appointments->phone}}</td>
                                            <td>{{$appointments->message}}</td>
                                            <td>{{$appointments->schedule}}</td>
                                            <td>{{$appointments->time}}</td>
                                            <td><div class="form-inline"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal{{$appointments->id}}">
                                                    Accept
                                                </button>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal{{$appointments->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Information</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        {!! Form::open(['action' => ['AppointmentController@update', $appointments->space_id], 'method' => 'POST']) !!}
                                                        <div class="modal-body">
                                                        Your about to accept an appointment of Mr/Ms. {{$appointments->firstname}} {{$appointments->lastname}} that scheduled in {{$appointments->time}}, {{$appointments->schedule}}! <br><br> Are you sure you want to accept the appointment?
                                                        </div>
                                                        <div class="modal-footer">
                                                        {{Form::hidden('_method','PUT')}}
                                                        {{Form::submit('Yes', ['class' => 'btn btn-primary'])}}
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                        
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalx{{$appointments->id}}">
                                                    Ignore
                                                </button>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="modalx{{$appointments->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Information</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        {!! Form::open(['action' => ['AppointmentController2@update', $appointments->space_id], 'method' => 'POST']) !!}
                                                        <div class="modal-body">
                                                        Your about to ignore an appointment of Mr/Ms. {{$appointments->firstname}} {{$appointments->lastname}} that scheduled in {{$appointments->time}}, {{$appointments->schedule}}! <br><br> Are you sure you want to ignore the appointment?
                                                        </div>
                                                        <div class="modal-footer">
                                                        {{Form::hidden('_method','PUT')}}
                                                        {{Form::submit('Yes', ['class' => 'btn btn-danger'])}}
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                        
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                    </div>
                                                </div></div></td>
                                        </tr>
                                    @else

                                    @endif
                                @else

                                @endif

                            @endforeach
                            @else
                            
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-family: Century Gothic; font-size: 20px">Confirmed Appointment</div>
            
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Space Name</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Message</th>
                                <th scope="col">Schedule</th>
                                <th scope="col">Time</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($appointment) > 0)
                                @foreach($appointment as $appointments)
                                    @if($appointments->owner_id == auth()->user()->id)
                                        @if($appointments->accept == 1)
                                            <tr>
                                                <td>{{$appointments->space_name}}</td>
                                                <td>{{$appointments->firstname}}</td>
                                                <td>{{$appointments->lastname}}</td>
                                                <td>{{$appointments->phone}}</td>
                                                <td>{{$appointments->message}}</td>
                                                <td>{{$appointments->schedule}}</td>
                                                <td>{{$appointments->time}}</td>
                                                <td><div class="form-inline"><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal{{$appointments->id}}">
                                                        Done
                                                    </button>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal{{$appointments->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Information</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            Did Mr/Ms. {{$appointments->firstname}} {{$appointments->lastname}} agreed to rent the space?
                                                            </div>
                                                            <div class="modal-footer">
                                                            
                                                            {!! Form::open(['action' => ['AppointmentConroller4@update', $appointments->space_id],'method' => 'POST']) !!}
                                                            {{Form::hidden('_method','PUT')}}
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modald{{$appointments->id}}">
                                                                Yes
                                                            </button>
                                                            {{Form::submit('No', ['class' => 'btn btn-secondary'])}}
                                                            {!! Form::close() !!}
                                                            
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modald{{$appointments->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Rent Duration</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                {!! Form::open(['action' => ['AppointmentConroller4@update', $appointments->space_id], 'method' => 'PATCH']) !!}
                                                                
                                                                <div class="modal-body">
                                                                        {{Form::text('space_id', $appointments->space_id, ['class' => 'form-control', 'style' => 'display: none'])}}
                                                                        {{Form::text('user_id', $appointments->user_id, ['class' => 'form-control', 'style' => 'display: none'])}}
                                                                        {{Form::text('space_name', $appointments->space_name, ['class' => 'form-control', 'style' => 'display: none'])}}
                                                                        {{Form::text('firstname', $appointments->firstname, ['class' => 'form-control', 'style' => 'display: none'])}}
                                                                        {{Form::text('lastname', $appointments->lastname, ['class' => 'form-control', 'style' => 'display: none'])}}
                                                                        Monthly duration: 
                                                                    <div class="form-group font-weight-bold">
                                                                    {{Form::select('rent_duration', [ 
                                                                        '1 Month' => '1 Month', 
                                                                        '2 Months' => '2 Months',
                                                                        '3 Months' => '3 Months',
                                                                        '4 Months' => '4 Months',
                                                                        '5 Months' => '5 Months',
                                                                        '6 Months' => '6 Months',
                                                                        '7 Months' => '7 Months',
                                                                        '8 Months' => '8 Months',
                                                                        '9 Months' => '9 Months',
                                                                        '10 Months' => '10 Months',
                                                                        '11 Months' => '11 Months',
                                                                        '12 Months' => '12 Months',], null, ['class' => 'form-control col-md-8']) }}
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                                </div>
                                                                {!! Form::close() !!}
                                                            </div>
                                                            </div>
                                                        </div>
                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modalx{{$appointments->id}}">
                                                        Cancel
                                                    </button>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modalx{{$appointments->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Information</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            {!! Form::open(['action' => ['AppointmentController3@update', $appointments->space_id], 'method' => 'POST']) !!}
                                                            <div class="modal-body">
                                                            Your about to cancel an appointment of Mr/Ms. {{$appointments->firstname}} {{$appointments->lastname}} that scheduled in {{$appointments->time}}, {{$appointments->schedule}}! <br><br> Are you sure you want to cancel the appointment?
                                                            </div>
                                                            <div class="modal-footer">
                                                            {{Form::hidden('_method','PUT')}}
                                                            {{Form::submit('Yes', ['class' => 'btn btn-danger'])}}
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                            
                                                            </div>
                                                            {!! Form::close() !!}
                                                        </div>
                                                        </div>
                                                    </div></div>
                                                    </td>
                                            </tr>
                                        @else
        
                                        @endif
                                    @else 

                                    @endif

                                @endforeach
                                @else
                                
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <hr>
    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-family: Century Gothic; font-size: 20px">Success Appointment</div>
            
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Space Name</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Message</th>
                                <th scope="col">Schedule</th>
                                <th scope="col">Time</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($appointment) > 0)
                                @foreach($appointment as $appointments)
                                    @if($appointments->owner_id == auth()->user()->id)
                                        @if($appointments->accept == 4)
                                            <tr>
                                                <td>{{$appointments->space_name}}</td>
                                                <td>{{$appointments->firstname}}</td>
                                                <td>{{$appointments->lastname}}</td>
                                                <td>{{$appointments->phone}}</td>
                                                <td>{{$appointments->message}}</td>
                                                <td>{{$appointments->schedule}}</td>
                                                <td>{{$appointments->time}}</td>
                                            </tr>
                                        @else
        
                                        @endif
                                    @else

                                    @endif
                                @endforeach
                                @else
                                
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <hr>
    <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-family: Century Gothic; font-size: 20px">Ignored Appointment</div>
            
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Space Name</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Message</th>
                                <th scope="col">Schedule</th>
                                <th scope="col">Time</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($appointment) > 0)
                                @foreach($appointment as $appointments)
                                    @if($appointments->owner_id == auth()->user()->id)
                                        @if($appointments->accept == 2)
                                            <tr>
                                                <td>{{$appointments->space_name}}</td>
                                                <td>{{$appointments->firstname}}</td>
                                                <td>{{$appointments->lastname}}</td>
                                                <td>{{$appointments->phone}}</td>
                                                <td>{{$appointments->message}}</td>
                                                <td>{{$appointments->schedule}}</td>
                                                <td>{{$appointments->time}}</td>
                                            </tr>
                                        @else
        
                                        @endif
                                    @else

                                    @endif
                                @endforeach
                                @else
                                
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="font-family: Century Gothic; font-size: 20px">Canceled Appointment</div>
            
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Space Name</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Message</th>
                                <th scope="col">Schedule</th>
                                <th scope="col">Time</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($appointment) > 0)
                                @foreach($appointment as $appointments)
                                    @if($appointments->owner_id == auth()->user()->id)
                                        @if($appointments->accept == 3)
                                            <tr>
                                                <td>{{$appointments->space_name}}</td>
                                                <td>{{$appointments->firstname}}</td>
                                                <td>{{$appointments->lastname}}</td>
                                                <td>{{$appointments->phone}}</td>
                                                <td>{{$appointments->message}}</td>
                                                <td>{{$appointments->schedule}}</td>
                                                <td>{{$appointments->time}}</td>
                                            </tr>
                                        @else
        
                                        @endif
                                    @else

                                    @endif
                                @endforeach
                                @else
                                
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection