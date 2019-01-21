@extends('user.user-layouts.app')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="rounded mx-auto d-block" style="height: 550px;" src="/storage/images/{{$commercialspace->image1}}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="rounded mx-auto d-block" style="height: 550px;" src="/storage/images/{{$commercialspace->image2}}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="rounded mx-auto d-block" style="height: 550px;" src="/storage/images/{{$commercialspace->image3}}" alt="Third slide">
          </div>
          
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
</div>

<main role="main" class="container" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="row">
      <div class="col-md-8 blog-main">

        <div class="blog-post" style="padding-bottom: 5px;">
        <h1 class="blog-post-title text-uppercase" style="font-family: Century Gothic;">{{$commercialspace->space_name}}</h1>

          <p style="font-family: Century Gothic; font-size: 20px"><i class="fa fa-map-marker" style="font-size:40px;color:red;"></i>  Tetuan, Don Alfaro St</p>

        </div><!-- /.blog-post -->

        <hr style="border-top: 1px solid #8c8b8b;">

        <div class="blog-post" style="padding-top: 20px; padding-bottom: 20px;">
          <h3 class="blog-post-title text-uppercase" style="font-family: Century Gothic;">About the space</h3>
          <p style="font-family: Century Gothic; font-size: 20px">{{$commercialspace->about_space}}</p>
          
        </div><!-- /.blog-post -->

        <hr style="border-top: 1px solid #8c8b8b;">

        <div class="blog-post" style="padding-top: 20px; padding-bottom: 20px;">
          <h3 class="blog-post-title text-uppercase" style="font-family: Century Gothic;">About the area</h3>
          <p style="font-family: Century Gothic; font-size: 20px">{{$commercialspace->about_area}}</p>
        </div><!-- /.blog-post -->

        <hr style="border-top: 1px solid #8c8b8b;">

        <div class="blog-post" style="padding-top: 20px; padding-bottom: 20px;">
            <h3 class="blog-post-title text-uppercase" style="font-family: Century Gothic;">Reviews</h3>
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Reviews
            </button>
            <div class="collapse" id="collapseExample">
            <div class="comments">
                <ul class="list-group">
                    @foreach($comment as $comments)
                        @if($comments->space_id == $commercialspace->id)
                          @if($comments->user_id == $user_id)
                            <li class="list-group-item">
                                <strong>
                                    {{$comments->firstname}} {{$comments->lastname}}:
                                </strong>

                                {{$comments->body}}
                                {!! Form::open(['action' => ['CommentController@destroy', $comments->id], 'method' => 'POST']) !!}
                                {{Form::hidden('_method','DELETE')}}
                                <p><small>{{$comments->created_at->diffForHumans()}}
                                {{Form::submit('Delete', ['class' => 'btn btn-sm btn-link'])}}</small></p>
                                {!! Form::close() !!}
                                </li>
                          @else 
                            <li class="list-group-item">
                              <strong>
                                  {{$comments->firstname}} {{$comments->lastname}}:
                              </strong>

                              {{$comments->body}}
                              <p><small>{{$comments->created_at->diffForHumans()}}</small></p>
                              </li>
                          @endif                                                                                                            
                        @endif
                    @endforeach
                </ul>
            </div>
            </div>
          </div><!-- /.blog-post -->

      </div><!-- /.blog-main -->

      <aside class="col-md-4 blog-sidebar">
        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 box-shadow">
            <div class="card-header bg-dark">
              <h4 class="my-0 font-weight-normal text-light" style="font-family: Century Gothic;">Rental Details</h4>
            </div>
            <div class="card-body">
              @if($commercialspace->status == "Unavailable")
                <h1 class="card-title pricing-card-title text-primary">&#8369;{{$commercialspace->price}} <small class="text-muted">/ {{$commercialspace->type}}</small></h1>
                <ul class="list-unstyled mt-3 mb-4" style="font-family: Century Gothic; font-size: 20px">
                <li><i class="fa fa-expand" style="font-size:18px;"></i> {{$commercialspace->sqm}} sqm</li>
                <li><i class="fa fa-bath" style="font-size:18px;"></i> {{$commercialspace->cr}} Bathroom</li>
                <li><i class="fa fa-info" style="font-size:18px;"></i> {{$commercialspace->status}}</li> 
                </ul>
              @else

                  <h1 class="card-title pricing-card-title text-primary">&#8369;{{$commercialspace->price}} <small class="text-muted">/ {{$commercialspace->type}}</small></h1>
                    <ul class="list-unstyled mt-3 mb-4" style="font-family: Century Gothic; font-size: 20px">
                    <li><i class="fa fa-expand" style="font-size:18px;"></i> {{$commercialspace->sqm}} sqm</li>
                    <li><i class="fa fa-bath" style="font-size:18px;"></i> {{$commercialspace->cr}} Bathroom</li>
                    <li><i class="fa fa-info" style="font-size:18px;"></i> {{$commercialspace->status}}</li> 
                  </ul>

                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Book a visit
                  </button>
              @endif

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Schedule a visit for {{$commercialspace->space_name}}</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    {!! Form::open(['action' => 'AppointmentController@store', 'method' => 'POST']) !!}
                    <div class="modal-body">
                        {{Form::text('space_id', $commercialspace->id, ['class' => 'form-control', 'style' => 'display: none'])}}
                        {{Form::text('owner_id', $commercialspace->owner_id, ['class' => 'form-control', 'style' => 'display: none'])}}
                        {{Form::text('space_name', $commercialspace->space_name, ['class' => 'form-control', 'style' => 'display: none'])}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {{Form::text('firstname', auth()->user()->firstname, ['class' => 'form-control', 'readonly'])}}
                            </div>
                            <div class="form-group col-md-6">
                                {{Form::text('lastname', auth()->user()->lastname, ['class' => 'form-control', 'readonly'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            {{Form::text('phone', auth()->user()->phone, ['class' => 'form-control', 'readonly'])}}
                        </div>
                        <div class="form-group">
                            {{Form::textarea('message', '', ['class' => 'form-control', 'rows' =>'3', 'placeholder' => 'Send message to the owner.', 'required'])}}
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            {{Form::date('schedule', '', ['class' => 'form-control', 'min' => '2018-01-01', 'required'])}}
                            </div>
                            <div class="form-group col-md-6">
                            {{Form::time('time', '', ['class' => 'form-control', 'required'])}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        @if(count($appointment) > 0)
                        
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            Submit
                          </button>
                          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Reminder</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Note that you have a previous appointment, Are you sure you want to book a visit again?
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                    {{Form::submit('Yes', ['class' => 'btn btn-primary'])}}
                                  </div>
                                </div>
                              </div>
                            </div>
                        @else 
                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                        @endif
                    </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="card-deck mb-3 text-center">
          <div class="card mb-4 box-shadow">
            <div class="card-header bg-dark">
              <h4 class="my-0 font-weight-normal text-light" style="font-family: Century Gothic;">Contact Us</h4>
            </div>
            <div class="card-body">
              <h3 class="card-title pricing-card-title text-primary">Owner: {{$commercialspace->owner_name}}</h3>
                <ul class="list-unstyled mt-3 mb-4" style="font-family: Century Gothic; font-size: 18px">
                <li>Email: {{$commercialspace->email}}</li>
                <li>Phone No: {{$commercialspace->mobile_no}}</li>
                <li>Tel No: {{$commercialspace->tel_no}}</li>
              </ul>
              
            </div>
          </div>
        </div>
      </aside><!-- /.blog-sidebar -->

      

    </div><!-- /.row -->

  </main><!-- /.container -->

  <div style="padding-top: 50px; padding-bottom: 50px;">
      <input type="text" value="{{$commercialspace->latitude}}" style="display: none;" id="lat">
      <input type="text" value="{{$commercialspace->longitude}}" style="display: none;" id="lng">
      <div style="width: 100%; height: 400px;" id="map"></div>
  </div>

  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

<script type="text/javascript">
  function initMap()
  {
      var myLatlng = new google.maps.LatLng($('#lat').val(),$('#lng').val());
      var mapOptions =
      {
          zoom: 18,
          center: myLatlng,
          scrollwheel:false
      }
      var map = new google.maps.Map(document.getElementById("map"), mapOptions);

      var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          draggable: false
      });
  }

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&callback=initMap"></script>
@endsection