@extends('user.user-layouts.app')

@section('content')
<div class="container" style="padding-top: 100px; padding-bottom: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="font-family: Century Gothic; font-size: 20px">Pending</div>
        
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Space Name</th>
                            <th scope="col">Message</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($appointment) > 0)
                            @foreach($appointment as $appointments)
                                @if($appointments->user_id == auth()->user()->id)
                                    @if($appointments->accept == 0)
                                        <tr>
                                            <td>{{$appointments->space_name}}</td>
                                            <td>{{$appointments->message}}</td>
                                            <td>{{$appointments->schedule}}</td>
                                            <td>{{$appointments->time}}</td>
                                            <!-- Button trigger modal -->
                                            <td><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal{{$appointments->id}}">
                                                Cancel
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
                                                    {!! Form::open(['action' => ['AppointmentController3@update', $appointments->space_id], 'method' => 'POST']) !!}
                                                    <div class="modal-body">
                                                    Your about to cancel an appointment on {{$appointments->space_name}} that scheduled in {{$appointments->time}}, {{$appointments->schedule}}! <br><br> Are you sure you want to cancel the appointment?
                                                    </div>
                                                    <div class="modal-footer">
                                                    {{Form::hidden('_method','PUT')}}
                                                    {{Form::submit('Yes', ['class' => 'btn btn-danger'])}}
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                                </div>
                                            </div></td>
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
                                <th scope="col">Message</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($appointment) > 0)
                                @foreach($appointment as $appointments)
                                    @if($appointments->user_id == auth()->user()->id)
                                        @if($appointments->accept == 1)
                                            <tr>
                                                <td>{{$appointments->space_name}}</td>
                                                <td>{{$appointments->message}}</td>
                                                <td>{{$appointments->schedule}}</td>
                                                <td>{{$appointments->time}}</td>
                                                <td><button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#modal{{$appointments->id}}">
                                                        Cancel
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
                                                            {!! Form::open(['action' => ['AppointmentController3@update', $appointments->space_id], 'method' => 'POST']) !!}
                                                            <div class="modal-body">
                                                            Your about to cancel an appointment on {{$appointments->space_name}} that scheduled in {{$appointments->time}}, {{$appointments->schedule}}! <br><br> Are you sure you want to cancel the appointment?
                                                            </div>
                                                            <div class="modal-footer">
                                                            {{Form::hidden('_method','PUT')}}
                                                            {{Form::submit('Yes', ['class' => 'btn btn-danger'])}}
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                            
                                                            </div>
                                                            {!! Form::close() !!}
                                                        </div>
                                                        </div>
                                                    </div></td>
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
                                <th scope="col">Message</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($appointment) > 0)
                                @foreach($appointment as $appointments)
                                    @if($appointments->user_id == auth()->user()->id)
                                        @if($appointments->accept == 4)
                                            <tr>
                                                <td>{{$appointments->space_name}}</td>
                                                <td>{{$appointments->message}}</td>
                                                <td>{{$appointments->schedule}}</td>
                                                <td>{{$appointments->time}}</td>
                                                <td><button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal{{$appointments->id}}">
                                                        How's your visit?
                                                    </button>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal{{$appointments->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">Tell us about the space</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="card">
                                                                    <div class="card-body">
                                                                        {!! Form::open(['action' => 'CommentController@store', 'method' => 'POST']) !!}
                                                                            <div class="form-group">
                                                                                {{Form::text('owner_id', $appointments->space_id, ['class' => 'form-control', 'style' => 'display: none;'])}}
                                                                                {{Form::textarea('comment', '', ['class' => 'form-control', 'rows' =>'3', 'placeholder' => 'Your comment here.', 'required'])}}
                                                                            </div>
                                                                            <div class="form-group">
                                                                                {{Form::submit('Write a review', ['class' => 'btn btn-primary'])}}
                                                                            </div>
                                                                        {!! Form::close() !!}
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div></td>
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
                                <th scope="col">Message</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($appointment) > 0)
                                @foreach($appointment as $appointments)
                                    @if($appointments->user_id == auth()->user()->id)
                                        @if($appointments->accept == 2)
                                            <tr>
                                                <td>{{$appointments->space_name}}</td>
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
                                <th scope="col">Message</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(count($appointment) > 0)
                                @foreach($appointment as $appointments)
                                    @if($appointments->user_id == auth()->user()->id)
                                        @if($appointments->accept == 3)
                                            <tr>
                                                <td>{{$appointments->space_name}}</td>
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